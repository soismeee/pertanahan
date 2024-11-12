<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PeminjamanModel;
use App\Models\BukuTanahModel;
use Dompdf\Dompdf;

class Peminjaman extends BaseController
{
    protected $PeminjamanModel;
    protected $BukuTanahModel;


    public function __construct()
    {
        $this->PeminjamanModel = new PeminjamanModel();
        $this->BukuTanahModel = new BukuTanahModel();
    }


    public function index()
    {
        $data = [
            'title'         => 'Peminjaman',
            'peminjaman'    => $this->PeminjamanModel->getPeminjaman(),
        ];
        return view('peminjaman/index', $data);
    }

    public function getData(){
        $status = $this->request->getPost('status');
        $peminjaman = $this->PeminjamanModel->getPeminjamanWhereStatus($status);
        return $this->response->setJSON(['data' => $peminjaman]);

    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data ',
            'buku_tanah' => $this->BukuTanahModel->getBukutanah(),
        ];
        return view('peminjaman/tambah', $data);
    }

    public function save()
    {
        $data = [
            'user_id' => session()->get('id_user'),
            'buku_tanah_id' => $this->request->getPost('buku_tanah_id'),
            'jenis_permohonan' => $this->request->getPost('jenis_permohonan'),
            'no_shm_shgb' => $this->request->getPost('no_shm_shgb'),
            'notaris' => $this->request->getPost('notaris'),
            'tanggal_peminjaman' => date('Y-m-d')
           
        ];
        $this->PeminjamanModel->save($data);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to(base_url('Peminjaman'));
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Peminjaman',
            'peminjaman' => $this->PeminjamanModel->getPeminjaman($id),
            'buku_tanah' => $this->BukuTanahModel->getBukutanah(),
        ];
        // dd($data['peminjaman'][0]['id_peminjaman']);
        echo view('peminjaman/edit', $data);    
    }

    public function proses($id){
        $data = [
            'title' => 'Proses Data Peminjaman',
            'data' => $this->PeminjamanModel->getPeminjaman($id),
        ];
        echo view('peminjaman/proses', $data);
    }

    public function update($id)
    {
        // dd($this->request->getPost());
        $data = [
            'buku_tanah_id' => $this->request->getPost('buku_tanah_id'),
            'jenis_permohonan' => $this->request->getPost('jenis_permohonan'),
            'no_shm_shgb' => $this->request->getPost('no_shm_shgb'),
            'notaris' => $this->request->getPost('notaris'),
            'tanggal_peminjaman' => $this->request->getPost('tanggal_peminjaman')
        ];
        $this->PeminjamanModel->update($id, $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!!');
        return redirect()->to(base_url('Peminjaman'));
    }

    public function storeUpdate($id)
    {
        $data = [
            'status' => $this->request->getPost('status'),
            'pengembalian' => date('Y-m-d')
        ];
        $this->PeminjamanModel->update($id, $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!!');
        return redirect()->to(base_url('Peminjaman'));
    }

    public function delete($id)
    {
        $this->PeminjamanModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to(base_url('peminjaman'));
    }
    
    public function cetak()
    {
        $data = [
            'title' => 'Cetak Data ',
            'manajemen'  => $this->PeminjamanModel->getPeminjaman(),

        ];
        return view('peminjaman/cetak', $data);
    }
    
    public function cetakBukti($id)
    {
        $data = [
            'title' => 'Cetak Peminjaman',
            'manajemen'  => $this->PeminjamanModel->getPeminjaman($id),

        ];
        return view('peminjaman/bukti_peminjaman', $data);
    }
}