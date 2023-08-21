<?php


namespace App\Controllers;

class Administrasi extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Asisten | Robotics & Embedded System Laboratory"
        ];

        return view('layout/header', $data)
            . view('administrasi/index')
            . view('layout/footer');
    }
    public function surat()
    {
        if (!$this->request->is("POST")) {
            return $this->response->setStatusCode(404);
        }

        if (isset($_POST["submit"])) {

            $data["date"] = $this->fullDate;

            $data["hal"] = $_POST["jenis"];
            $data["tujuan"] = $_POST["tujuan"];
            $data["datadiri"] = [
                "nama" => ucwords($_POST["nama"]),
                "nim" => $_POST["nim"],
                "nohp" => $_POST["nohp"]
            ];
            $data["datakomponen"] = $_POST["data"];

            $data["koorInventaris"] = [
                "nama" => "Melly Wasilah Ananda",
                "nim" => "1911511003"
            ];
        } else {
            header("Location: /administrasi");
        }

        return view('administrasi/surat', $data);
    }
    public function tes()
    {
    }
}
