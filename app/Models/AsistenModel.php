<?php

namespace App\Models;

use CodeIgniter\Model;

class AsistenModel extends Model
{
    protected $table = "asisten_reslab";
    protected $primaryKey = "id_asisten";
    protected $allowedFields = [
        "reg_asisten",
        "nama_asisten",
        "ttl_asisten",
        "jabatan_asisten",
        "status_asisten",
        "slug_asisten",
        "card_id"
    ];

    public function getAsisten($slug = false): array
    {
        if (!$slug) {
            return $this->findAll();
        }
        return $this->where("slug_asisten", "$slug")->first();
    }
    public function saveAsisten($data)
    {
        return $this->save([
            "reg_asisten" => strtoupper($data["reg-asisten"]),
            "nama_asisten" => ucwords($data["nama-asisten"]),
            "ttl_asisten" => ucwords($data["ttl-asisten"]),
            "jabatan_asisten" => ucwords($data["jabatan-asisten"]),
            "status_asisten" => ucwords($data["status-asisten"]),
            "slug_asisten" => url_title($data["nama-asisten"], "-", true),
            "card_id" => strtoupper($data["card-id"])
        ]);
    }

    public function cardIdAvailable($tag_id)
    {
        $tag_asisten = $this->findColumn("card_id");
        $cardReady = in_array($tag_id, $tag_asisten);
        if ($cardReady) {
            $dataAsisten = $this->where("card_id", $tag_id)->first();
            return [$cardReady, $dataAsisten];
        }
        return [$cardReady, null];
    }
}
