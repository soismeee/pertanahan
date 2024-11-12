<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    public function detailSetting()
    {
        return $this->db->table('setting')
            ->where('id_setting', '1')
            ->get()->getRowArray();
    }

    public function saveSetting($data)
    {
        $this->db->table('setting')
            ->where('id_setting', '1')
            ->update($data);
    }
}
