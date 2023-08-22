<?php

namespace App\Controllers;

use App\Models\AsistenModel;

class Asisten extends BaseController
{
    protected $asistenModel;

    public function __construct()
    {
        $this->asistenModel = new AsistenModel();
    }

    public function index(): String
    {
        $data = [
            "title" => "Asisten | Robotics & Embedded System Laboratory",
            "asisten" => $this->asistenModel->getAsisten()
        ];

        return view("layout/header", $data)
            . view("asisten/index", $data)
            . view("layout/footer");
    }
    public function detail(String $slug)
    {
        $data = [
            "title" => "Asisten | Robotics & Embedded System Laboratory",
            "asisten" => $this->asistenModel->getAsisten($slug)
        ];
        dd($data);
        // return view("layout/header")
        //     . view("asisten/index", $data)
        //     . view("layout/footer");
    }
    public function addAsisten()
    {
        helper("form");

        if ($this->request->is("GET")) {
            return view("asisten/add-asisten");
        }

        if ($this->request->is("POST")) {
            $data = $this->request->getPost();
            return $this->asistenModel->saveAsisten($data);
        }

        return $this->response->setStatusCode(404);
    }
}
