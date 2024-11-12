<?php
namespace App\Models;
use CodeIgniter\Model;
class BukuTanahModel extends Model
{
    protected $table            = 'buku_tanah';
    protected $primaryKey       = 'id_buku_tanah';
    protected $allowedFields    = ['id_buku_tanah', 'kode_buku', 'jenis', 'no', 'desa_id', 'luas', 'pemegang_hak'];


    public function getBukutanah($id = false)
    {
        if ($id == false) {
            return $this
            ->join('desa', 'desa.id_desa = buku_tanah.desa_id')
            ->join('kecamatan', 'kecamatan.id_kecamatan = desa.kecamatan_id')
            ->findAll();
        }   
        
        return $this
        ->join('desa', 'desa.id_desa = buku_tanah.desa_id')
        ->where(['id_desa' => $id])->first(); 
    }
}