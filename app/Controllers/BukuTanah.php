<?php 

namespace App\Controllers;

use App\Models\BukuTanahModel;
use App\Models\DesaModel;

class BukuTanah extends BaseController
{
    protected $DesaModel;
    protected $BukuTanahModel;

    public function __construct()
    {
        $this->DesaModel = new DesaModel();
        $this->BukuTanahModel = new BukuTanahModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Buku tanah',
            'bukutanah' => $this->BukuTanahModel->getBukutanah()
        ];
        return view('buku_tanah/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Buku tanah',
            'desa' => $this->DesaModel->getDesa()
        ];
        return view('buku_tanah/tambah', $data);
    }

    public function save()
    {
        $data = [
            'kode_buku' => $this->request->getPost('kode_buku'),
            'jenis' => $this->request->getPost('jenis'),
            'luas' => $this->request->getPost('luas'),
            'pemegang_hak' => $this->request->getPost('pemegang_hak'),
            'desa_id' => $this->request->getPost('desa_id')
        ];
        $this->BukuTanahModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('bukuTanah'));
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Buku tanah',
            'desa' => $this->DesaModel->getDesa(),
            'buku_tanah' => $this->BukuTanahModel->where('id_buku_tanah', $id)->first()
        ];
        return view('buku_tanah/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_buku_tanah');
        $data = [
            'kode_buku' => $this->request->getPost('kode_buku'),
            'jenis' => $this->request->getPost('jenis'),
            'luas' => $this->request->getPost('luas'),
            'pemegang_hak' => $this->request->getPost('pemegang_hak'),
            'desa_id' => $this->request->getPost('desa_id')
        ];

        $this->BukuTanahModel->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil diupdate');
        return redirect()->to(base_url('bukutanah'));
    }

    public function delete($id)
    {
        $this->BukuTanahModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('bukutanah'));
    }
}

?>