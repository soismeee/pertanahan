<?php

namespace App\Controllers;

use \App\Models\SettingModel;

class Setting extends BaseController
{
    protected $settingModel;

    public function __construct()
    {
        helper('form');
        $this->settingModel = new SettingModel();
    }
    public function identitas()
    {
        $data = [
            'title'     => 'Setting Identitas Instansi',
            'setting'   => $this->settingModel->detailSetting(),
        ];
        echo view('setting/identitas', $data);
    }

    public function saveiden()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
        ];
        $this->settingModel->saveSetting($data);
        return redirect()->to('setting/identitas/');
    }

    public function home()
    {
        $data = [
            'title'     => 'Setting Identitas Sekolah',
            'setting'   => $this->settingModel->detailSetting(),
        ];
        echo view('setting/home', $data);
    }

    public function savehome()
    {
        $data = [
            'home' => $this->request->getPost('home'),
        ];
        $this->settingModel->saveSetting($data);
        return redirect()->to('setting/home/');
    }
}
