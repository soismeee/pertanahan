<?php
namespace App\Models;
use CodeIgniter\Model;
class KecamatanModel extends Model
{
    protected $table            = 'kecamatan';
    protected $primaryKey       = 'id_kecamatan';
    protected $allowedFields    = ['id_kecamatan','nama_kecamatan'];


    public function getKecamatan($id = false)
    {
        if($id === false){
            return $this->findAll(); 
        } else {
            return $this->getWhere(['id_kecamatan' => $id]);
        }   
    }
}