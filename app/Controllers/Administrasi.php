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
        if (!$this->request->is("POST")) {
            return $this->response->setStatusCode(401);
        }

        date_default_timezone_set('Asia/Jakarta');

        if (isset($_POST["submit"])) {
            $day = date("d");
            $month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember",][(int)date("m") - 1];
            $year = date("Y");

            $data["date"] = "$day $month $year";

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
