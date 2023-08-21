<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigModel extends Model
{
    protected $table = "config";
    protected $primaryKey = "id_config";
    protected $allowedFields = ["card_mode", "card_recent", "ket"];

    public function getCardMethod()
    {
        return $this->findColumn('card_mode')[0];
    }
    public function saveNewTag($tag_id)
    {
        $data = [
            "card_recent" => $tag_id
        ];
        return $this->update(1, $data);
    }
}
