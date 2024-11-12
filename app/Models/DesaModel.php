<?php 

namespace App\Models;

use CodeIgniter\Model;

class DesaModel extends Model
{
    protected $table = 'desa';
    protected $primaryKey = 'id_desa';
    protected $allowedFields = ['nama_desa', 'kecamatan_id'];


    public function getDesa($id_desa = false)
    {
        if ($id_desa == false) {
            return $this
            ->join('kecamatan', 'kecamatan.id_kecamatan = desa.kecamatan_id')
            ->findAll();
        }   

        return $this
        ->join('kecamatan', 'kecamatan.id_kecamatan = desa.kecamatan_id')
        ->where(['id_desa' => $id_desa])->first();
    }

    public function getDesaByKecamatan($kecamatan_id)
    {
        return $this->where(['kecamatan_id' => $kecamatan_id])->findAll();
    }
}

?>