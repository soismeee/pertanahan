<?php

namespace App\Controllers;


class Setting extends BaseController
{
    protected $settingModel;

    public function __construct()
    {
        helper('form');
    }
    public function identitas()
    {
        $data = [
            'title'     => 'Setting Identitas Instansi',
        ];
        echo view('setting/identitas', $data);
    }

    public function home()
    {
        $data = [
            'title'     => 'Setting Identitas Sekolah',
        ];
        echo view('setting/home', $data);
    }
}
