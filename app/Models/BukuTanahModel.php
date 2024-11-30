<?php
namespace App\Models;
use CodeIgniter\Model;
class BukuTanahModel extends Model
{
    protected $table            = 'buku_tanah';
    protected $primaryKey       = 'id_buku_tanah';
    protected $allowedFields    = ['id_buku_tanah', 'kode_buku', 'jenis', 'gambar', 'no', 'desa_id', 'luas', 'pemegang_hak', 'letak'];


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
    
    public function getAvailableBukuTanah()
    {
        $db = \Config\Database::connect();

        // Subquery untuk mengambil buku_tanah_id dengan status 'pinjam' atau 'proses'
        $subquery = $db->table('peminjaman')
            ->select('buku_tanah_id')
            ->whereIn('status', ['pinjam', 'proses']);

        // Query utama untuk mengambil data buku tanah yang tidak ada di subquery
        return $this->whereNotIn('id_buku_tanah', $subquery)
            ->findAll();
    }


}