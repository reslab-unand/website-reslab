<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('layout/header')
                .view('index')
                .view('layout/footer');
    }
    public function welcome()
    {
        return view('welcome_message');
    }
}
