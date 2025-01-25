<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Web extends BaseController
{
    protected $settingModel;
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Home',

        ];
        return view('web/index', $data);
    }

    public function profil()
    {
        $data = [
            'title' => 'Profil',
        ];
        return view('web/profil', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact',
        ];
        return view('web/contact', $data);
    }
    
    public function lupapassword()
    {
        $data = [
            'title' => 'Profil',
        ];
        return view('web/lupa_password', $data);
    }

    public function cariakun(){
        $email = $this->UserModel->where('email', $this->request->getPost('email'))->where('no_hp', $this->request->getPost('no_hp'))->first();
        if ($email) {
            return $this->response->setJSON(['status' => 200, 'id' => $email['id_user'], 'message' => 'Akun ditemukan']);
        } else {
            return $this->response->setJSON(['status' => 400, 'message' => 'Akun tidak dapat ditemukan'], 400);
        }   
    }

    public function changePassword(){
        $data = [
            'password' => $this->request->getPost('password')
        ];
        $this->UserModel->update($this->request->getPost('id'), $data);
        return redirect()->to(base_url('Auth/login'));
    }
}
