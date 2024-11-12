<?php

namespace App\Controllers;

use App\Models\AuthModel;

use \App\Models\SettingModel;


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
                'level'     => [
                    'labels'    => 'Level',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
            ]
        )) {
            //jika valid
            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'email'     => $this->request->getPost('email'),
                'no_hp'     => $this->request->getPost('no_hp'),
                'password'  => $this->request->getPost('password'),
                'level'     => $this->request->getPost('level'),
            );
            $this->AuthModel->save_register($data);
            session()->setFlashdata('pesan', 'Registrasi Berhasil');
            return redirect()->to(base_url('Auth/login'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/register'));
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



    public function registercalon()
    {
        $data = array(
            'title'     => 'Halaman Registrasi Akun PPDB',
            'setting'   => $this->settingModel->detailSetting(),
            
        );
        return view('web/view/auth/register', $data);
    }

    public function save_registercalon()
    {
        if ($this->validate(
            [
                'no_akta'     => [
                    'label'     => 'No.Akta',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
                'nama'     => [
                    'label'     => 'Nama Lengkap',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
                'jenis_kelamin'     => [
                    'label'     => 'Jenis_kelamin',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
                'agama'     => [
                    'label'     => 'Agama',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
                'tempat_lahir'     => [
                    'label'     => 'Tempat Lahir',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
                'tanggal_lahir'     => [
                    'label'     => 'Tanggal Lahir',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
                'nama_ibu'     => [
                    'label'     => 'Nama Ibu',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
                'nama_ayah'     => [
                    'label'     => 'Nama Ayah',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
                'pekerjaan_ayah'     => [
                    'label'     => 'Nama Ibu',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
                'pekerjaan_ibu'     => [
                    'label'     => 'Nama Ayah',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
                'nama_dukuh'     => [
                    'label'     => 'Nama Dukuh',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
                'rt/rw'     => [
                    'label'     => 'RT/RW',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
                'kecamatan'     => [
                    'label'     => 'Kecamatan',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
                'kabupaten'     => [
                    'label'     => 'kabupaten',
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => '{field} Wajib diisi dan tidak boleh kosong !'
                    ]
                ],
            ]
        )) {
            //jika valid
            $data = array(
                'no_akta'           => $this->request->getPost('no_akta'),
                'nama'              => $this->request->getPost('nama'),
                'jenis_kelamin'     => $this->request->getPost('jenis_kelamin'),
                'agama'             => $this->request->getPost('agama'),
                'tempat_lahir'      => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir'     => $this->request->getPost('tanggal_lahir'),
                'nama_ibu'          => $this->request->getPost('nama_ibu'),
                'nama_ayah'         => $this->request->getPost('nama_ayah'),
                'pekerjaan_ayah'    => $this->request->getPost('pekerjaan_ayah'),
                'pekerjaan_ibu'     => $this->request->getPost('pekerjaan_ibu'),
                'nama_dukuh'        => $this->request->getPost('nama_dukuh'),
                'rt/rw'             => $this->request->getPost('rt/rw'),
                'kecamatan'         => $this->request->getPost('kecamatan'),
                'kabupaten'         => $this->request->getPost('kabupaten'),
                'status'            => 0,
                'password'          => $this->request->getPost('no_akta'),
            );
            $this->AuthModel->save_registercalon($data);
            session()->setFlashdata('pesan', 'Registrasi Berhasil');
            return redirect()->to(base_url('Auth/logincalon'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/registercalon'));
        }
    }


    public function logincalon()
    {
        $data = array(
            'title' => 'Halaman Login PPDB',
            'setting' => $this->settingModel->detailSetting(),
        );
        return view('web/view/auth/login', $data);
    }

    public function cek_logincalon()
    {
        if ($this->validate([
            'no_akta'     => [
                'label'     => 'No.Akta',
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
            $no_akta    = $this->request->getPost('no_akta');
            $password   = $this->request->getPost('password');
            $cek        = $this->AuthModel->logincalon($no_akta, $password);
            if ($cek) {
                //jika data cocok
                session()->set('log', true);
                session()->set('no_akta', $cek['no_akta']);
                session()->set('nama', $cek['nama']);
                session()->set('jenis_kelamin', $cek['jenis_kelamin']);
                session()->set('agama', $cek['agama']);
                session()->set('tempat_lahir', $cek['tempat_lahir']);
                session()->set('tanggal_lahir', $cek['tanggal_lahir']);
                session()->set('nama_ayah', $cek['nama_ayah']);
                session()->set('nama_ibu', $cek['nama_ibu']);
                session()->set('pekerjaan_ayah', $cek['pekerjaan_ayah']);
                session()->set('pekerjaan_ibu', $cek['pekerjaan_ibu']);
                session()->set('nama_dukuh', $cek['nama_dukuh']);
                session()->set('rt/rw', $cek['rt/rw']);
                session()->set('kecamatan', $cek['kecamatan']);
                session()->set('kabupaten', $cek['kabupaten']);
                session()->set('status', $cek['status']);
                session()->set('level', $cek['level']);

                //login suksess
                return redirect()->to(base_url('dashpendaftaran'));
            } else {
                //jika tidak cocok
                session()->setFlashdata('warning', 'Login gagal, Pastikan data benar');
                return redirect()->to(base_url('auth/logincalon'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/logincalon'));
        }
    }

    public function logoutcalon()
    {
        session()->remove('no_akta');
        session()->remove('nama');
        session()->remove('jenis_kelamin');
        session()->remove('agama');
        session()->remove('tempat_lahir');
        session()->remove('tanggal_lahir');
        session()->remove('nama_ayah');
        session()->remove('nama_ibu');
        session()->remove('pekerjaan_ayah');
        session()->remove('pekerjaan_ibu');
        session()->remove('nama_dukuh');
        session()->remove('rt/rw');
        session()->remove('kecamatan');
        session()->remove('kabupaten');
        session()->remove('status');
        session()->remove('level');

        //logout berhasil
        session()->setFlashdata('pesan', 'Logout suksess...');
        return redirect()->to(base_url('auth/logincalon'));
    }
}
