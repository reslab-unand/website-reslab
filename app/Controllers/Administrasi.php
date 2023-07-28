<?php

namespace App\Controllers;

class Administrasi extends BaseController
{
    public function index()
    {
        return view('layout/header')
            . view('administrasi/index')
            . view('layout/footer');
    }
    public function surat()
    {
        return view('administrasi/surat');
    }
}
