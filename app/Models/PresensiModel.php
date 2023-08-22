<?php

namespace App\Models;

use CodeIgniter\Model;

class PresensiModel extends Model
{
    protected $table = "presensi_asisten";
    protected $primaryKey = "id_presensi";
    protected $allowedFields = ["id_asisten", "nama_asisten", "day", "date", "time", "ket"];

    public function getAllAttendance()
    {
        return $this->findAll();
    }
    public function checkAttendance($namaAsisten, $date)
    {
        $array = ['nama_asisten' => $namaAsisten, 'date' => $date];
        return $this->where($array)->first();
    }
    public function addAttendance($data)
    {
        return $this->insert($data, false);
    }
}
