<?php

namespace App\Controllers;

use App\Models\AuthModel;

use \App\Models\SettingModel;
use Config\Services;

class Auth extends BaseController
{
    protected $AuthModel;
 
    protected $settingModel;


    public function __construct()
    {
        helper('form');
        $this->AuthModel = new AuthModel();
        $this->settingModel = new SettingModel();
      
    }

    public function register()
    {
        $data = array(
            'title' => 'Halaman Registrasi',
        );
        return view('auth/register', $data);
    }

    public function save_register()
    {
        if ($this->validate(
            [
                'nama_user'     => [
                    'labels'    => 'Nama User',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
                'email'     => [
                    'labels'    => 'E-mail',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
                'no_hp'     => [
                    'labels'    => 'No. HP',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
                'password'     => [
                    'labels'    => 'Password',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
            ]
        )) {

            $token = bin2hex(random_bytes(16)); // Generate token verifikasi

            //jika valid
            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'email'     => $this->request->getPost('email'),
                'no_hp'     => $this->request->getPost('no_hp'),
                'password'  => $this->request->getPost('password'),
                'level'     => "karyawan",
                'email_verified'            => 0,
                'email_verification_token'  => $token
            );
            $this->AuthModel->save_register($data);

            // Kirim email verifikasi
            $this->sendVerificationEmail($this->request->getPost('email'), $token);

            session()->setFlashdata('pesan', 'Registrasi Berhasil');
            return redirect()->to(base_url('Auth/login'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/register'));
        }
    }

    private function sendVerificationEmail($email, $token)
    {
        $emailService = Services::email();
        $emailService->setFrom('rosyidwilestari808@gmail.com', 'YourApp');
        $emailService->setTo($email);
        $emailService->setSubject('Verifikasi Email');
        $emailService->setMessage("
            <p>Terima kasih telah mendaftar.</p>
            <p>Klik link berikut untuk memverifikasi email Anda:</p>
            <p><a href='" . base_url("/Auth/verify/$token") . "'>Verifikasi Email</a></p>
        ");

        if (!$emailService->send()) {
            log_message('error', $emailService->printDebugger(['headers']));
        }
    }

    public function verify($token)
{
    $db = \Config\Database::connect();
    $user = $db->table('users')->where('email_verification_token', $token)->get()->getRow();

    if ($user) {
        // Perbarui status email_verified
        $db->table('users')->where('id_user', $user->id_user)->update([
            'email_verified'            => 1,
            'email_verification_token'  => null,
        ]);

        return redirect()->to('/auth/login')->with('success', 'Email berhasil diverifikasi. Silakan login.');
    } else {
        return redirect()->to('/auth/login')->with('error', 'Token verifikasi tidak valid.');
    }
}


    public function login()
    {
        $data = array(
            'title' => 'Halaman Login',
        );
        return view('auth/login', $data);
    }

    public function cek_login()
    {
        if ($this->validate([
            'email'     => [
                'labels'    => 'E-mail',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                ]
            ],
            'password'     => [
                'labels'    => 'Password',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                ]
            ],
        ])) {
            //jika valid
            $email      = $this->request->getPost('email');
            $password   = $this->request->getPost('password');
            $cek        = $this->AuthModel->login($email, $password);
            if ($cek) {
                //jika data cocok
                session()->set('log', true);
                session()->set('id_user', $cek['id_user']);
                session()->set('nama_user', $cek['nama_user']);
                session()->set('email', $cek['email']);
                session()->set('level', $cek['level']);
                session()->set('foto_user', $cek['foto_user']);

                //login suksess
                return redirect()->to(base_url('home'));
            } else {
                //jika tidak cocok
                session()->setFlashdata('warning', 'Login gagal, Pastikan data benar');
                return redirect()->to(base_url('auth/login'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/login'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('level');
        session()->remove('foto_user');

        //logout berhasil
        session()->setFlashdata('pesan', 'Logout suksess...');
        return redirect()->to(base_url('auth/login'));
    }
}
