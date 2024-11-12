<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

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

    public function save()
    {
        $model = new UserModel();
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' =>$this->request->getPost('password'),
            'nip' => $this->request->getPost('nip'),
            'bagian' => $this->request->getPost('bagian'),
            'level' => $this->request->getPost('level'),
            'no_hp' => $this->request->getPost('no_hp'),
        ];
        // dd($data);
        $model->save($data);
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