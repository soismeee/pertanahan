<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SettingModel;
use App\Models\UserModel;

class Web extends BaseController
{
    protected $settingModel;
    protected $UserModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
        $this->UserModel = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Home',
            'setting' => $this->settingModel->detailSetting(),

        ];
        return view('web/index', $data);
    }

    public function profil()
    {
        $data = [
            'title' => 'Profil',
            'setting' => $this->settingModel->detailSetting(),
        ];
        return view('web/profil', $data);
    }
    
    public function lupapassword()
    {
        $data = [
            'title' => 'Profil',
            'setting' => $this->settingModel->detailSetting(),
        ];
        return view('web/lupa_password', $data);
    }

    public function cariakun(){
        $email = $this->UserModel->where('email', $this->request->getPost('email'))->first();
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
