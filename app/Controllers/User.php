<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use Config\Services;

class User extends BaseController
{
    public function index()
    {
        $model = new UserModel();

        $data = [
            'title' => 'User',
            'user' => $model->getUser()
        ];
        return view('user/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah User'
        ];
        return view('user/tambah', $data);
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

    public function save()
    {
        $token = bin2hex(random_bytes(16)); // Generate token verifikasi


        $model = new UserModel();
        $file = $this->request->getFile('foto_user');
		$randomName = $file->getRandomName();
        $file->move('foto', $randomName);
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' =>$this->request->getPost('password'),
            'nip' => $this->request->getPost('nip'),
            'bagian' => $this->request->getPost('bagian'),
            'level' => $this->request->getPost('level'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email_verified' => 0,
            'email_verification_token'  => $token,
            'foto_user' => $randomName
        ];
        
        $model->save($data);
        // Kirim email verifikasi
        $this->sendVerificationEmail($this->request->getPost('email'), $token);

        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('user'));
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data = [
            'title' => 'Edit User',
            'user' => $model->where('id_user', $id)->first()
        ];
        return view('user/edit', $data);
    }

    public function update()
    {
        $model = new UserModel();

        $id = $this->request->getPost('id_user');
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' =>$this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
            'nip' => $this->request->getPost('nip'),
            'bagian' => $this->request->getPost('bagian'),
            'no_hp' => $this->request->getPost('no_hp'),
        ];

        if($this->request->getFile('foto_user') !== null){
            $file = $this->request->getFile('foto_user');
		    $randomName = $file->getRandomName();
            $file->move('foto', $randomName);
            $data['foto_user'] = $randomName;
        }

        // dd($data);
        $model->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil diupdate');
        return redirect()->to(base_url('user'));
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('user'));
    }
}
?>