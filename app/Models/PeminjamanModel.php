<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{

    protected $table            = 'peminjaman';
    protected $primaryKey       = 'id_peminjaman';
    protected $allowedFields    = ['id_peminjaman', 'user_id', 'buku_tanah_id', 'jenis_permohonan', 'no_shm_shgb', 'notaris', 'status', 'tanggal_peminjaman', 'tanggal_pengembalian'];
    
    public function getPeminjaman($id = false)
    {
        $query = $this
            ->select('peminjaman.*, peminjaman.id_peminjaman as id_peminjaman, users.nama_user, users.nip, users.bagian, buku_tanah.kode_buku, desa.nama_desa, kecamatan.nama_kecamatan')    
            ->join('users', 'users.id_user = peminjaman.user_id', 'left')
            ->join('buku_tanah', 'buku_tanah.id_buku_tanah = peminjaman.buku_tanah_id', 'left')
            ->join('desa', 'desa.id_desa = buku_tanah.desa_id', 'left')
            ->join('kecamatan', 'kecamatan.id_kecamatan = desa.kecamatan_id', 'left');

        if ($id !== false) {
            $query->where('peminjaman.id_peminjaman', $id);
        }

        if (session()->get('level') == "karyawan") {
            $query->where('user_id', session()->get('id_user'));
        }

        return $query->findAll();
    }
    
    public function getPeminjamanWhereStatus($status = "All")
    {
        $query = $this
            ->select('peminjaman.*, peminjaman.id_peminjaman as id_peminjaman, users.nama_user, users.nip, users.bagian, buku_tanah.kode_buku, desa.nama_desa, kecamatan.nama_kecamatan')    
            ->join('users', 'users.id_user = peminjaman.user_id', 'left')
            ->join('buku_tanah', 'buku_tanah.id_buku_tanah = peminjaman.buku_tanah_id', 'left')
            ->join('desa', 'desa.id_desa = buku_tanah.desa_id', 'left')
            ->join('kecamatan', 'kecamatan.id_kecamatan = desa.kecamatan_id', 'left');

        if ($status !== "All") {
            $query->where('peminjaman.status', $status);
        }

        return $query->findAll();
    }

    public function getLaporanPeminjaman($tgl_awal = false, $tgl_akhir = false){
        $query = $this
        ->select('peminjaman.*, peminjaman.id_peminjaman as id_peminjaman, users.nama_user, users.nip, users.bagian, buku_tanah.kode_buku, desa.nama_desa, kecamatan.nama_kecamatan')    
        ->join('users', 'users.id_user = peminjaman.user_id', 'left')
        ->join('buku_tanah', 'buku_tanah.id_buku_tanah = peminjaman.buku_tanah_id', 'left')
        ->join('desa', 'desa.id_desa = buku_tanah.desa_id', 'left')
        ->join('kecamatan', 'kecamatan.id_kecamatan = desa.kecamatan_id', 'left');

    if ($tgl_awal !== false AND $tgl_akhir !== false) {
        $query
        ->where('tanggal_peminjaman >=', $tgl_awal)
        ->where('tanggal_peminjaman <=', $tgl_akhir);
    }

    return $query->findAll();

    }
}