<?php

namespace App\Controllers;

use App\Models\AsistenModel;
use App\Models\PresensiModel;
use App\Models\ConfigModel;

class Api extends BaseController
{
    protected $asistenModel;
    protected $presensiModel;
    protected $configModel;

    public function __construct()
    {
        $this->asistenModel = new AsistenModel();
        $this->presensiModel =  new PresensiModel();
        $this->configModel = new ConfigModel();
    }

    public function presensi()
    {
        // if Method request POST
        if ($this->request->is("POST")) {
            $tag_id = (string)$this->request->getPost('tag_id');
            $data = ['status_post' => "", 'info' => "", 'info2' => "", 'status' => ""];

            if (!isset($tag_id) || is_null($tag_id) || strlen($tag_id) < 1) {
                $data = [
                    'status_post' => 'OK',
                    'info' => 'Paramater Kosong'
                ];
                return view('api/presensi', ["response" => $data]);
            }

            $card_mode = strtolower($this->configModel->getCardMethod());
            list($cardReady, $result) = $this->asistenModel->cardIDAvailable($tag_id);

            // Check if mode add_card
            if ($card_mode == "add_card") {
                if ($cardReady) {
                    $data = [
                        'status_post' => "Error",
                        'info' => "Tag Sudah Ada"
                    ];
                    return view('api/presensi', ["response" => $data]);
                }

                $this->configModel->saveNewTag($tag_id);
                $data = [
                    'status_post' => "Ok",
                    'info' => "Tag Baru Terbaca"
                ];
                return view('api/presensi', ["response" => $data]);
            }

            if (empty($result)) {
                $data = [
                    'status_post' => "Ok",
                    'info' => "Data Belum Ada"
                ];
                return view('api/presensi', ["response" => $data]);
            }
            $namaAsisten = $result["nama_asisten"];
            $ket = (intval(date("H")) > 8) ? 'Telat' : 'Hadir';
            $workingDays = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat"];

            // check hari kerja
            if (!in_array($this->day, $workingDays)) {
                $data = [
                    'status_post' => "Ok",
                    'info' => "Hari Libur"
                ];
                return view('api/presensi', ["response" => $data]);
            }

            // check apakah sudah pernah presensi
            if ($this->presensiModel->checkAttendance($namaAsisten, $this->fullDate)) {
                $data = [
                    'info' => $namaAsisten,
                    'info2' => "Sudah Presensi"
                ];
                return view('api/presensi', ["response" => $data]);
            }

            $dataPresensi = [
                'id_asisten' => intval($result['id_asisten']),
                'nama_asisten' => $result['nama_asisten'],
                'day' => $this->day,
                'date' => $this->fullDate,
                'time' => $this->time,
                'ket' => $ket
            ];

            if (!$this->presensiModel->addAttendance($dataPresensi)) {
                $data = [
                    'status_post' => "Error",
                    'info' => $namaAsisten,
                    'info2' => "Gagal Presensi"
                ];
                return view('api/presensi', ["response" => $data]);
            }

            $data = [
                'status_post' => "Ok",
                'info' => $namaAsisten,
                'info2' => "Berhasil Presensi",
                'status' => $ket
            ];
            return view('api/presensi', ["response" => $data]);
        }

        // if Method request GET
        $data = [
            "date" => date("Y-m-d"),
            "time" => $this->time,
            "card_mode" => strtolower($this->configModel->getCardMethod())
        ];
        return view('api/presensi', ["response" => $data]);
    }

    public function tes()
    {
        return view("/api/tes");
    }
}
