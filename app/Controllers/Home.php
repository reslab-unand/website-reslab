<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Robotics & Embedded System Laboratory"
        ];

        return view('layout/header', $data)
            . view('index')
            . view('layout/footer');
    }
    public function welcome()
    {
        return view('welcome_message');
    }
    public function maintenance()
    {
        $data = [
            "title" => "Page Under Maintenace"
        ];
        return view('layout/header', $data)
            . view('maintenance')
            . view('layout/footer');
    }
}
