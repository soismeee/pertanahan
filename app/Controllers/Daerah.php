<?php 

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\KecamatanModel;


class Daerah extends BaseController
{
    protected $DesaModel;
    protected $kecamatanModel;

    public function __construct()
    {
        $this->DesaModel = new DesaModel();
        $this->kecamatanModel = new KecamatanModel();
    }

    public function index()
    {
        $dataKec = $this->kecamatanModel->getKecamatan();
        $data = [
            'title' => 'Kecamatan',
            'dataKec' => $dataKec,
        ];
        return view('daerah/index', $data);
    }

    public function saveKec(){
        $data = [
            'nama_kecamatan' => $this->request->getPost('nama')
        ];
        $this->kecamatanModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('Daerah'));
    }

   public function updateKec(){
        $id = $this->request->getPost('id');
        $data = [
            'nama_kecamatan' => $this->request->getPost('nama')
        ];
        $this->kecamatanModel->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil diupdate');
        return redirect()->to(base_url('Daerah'));
    }

    public function deleteKec($id){
        $this->kecamatanModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('Daerah'));
    }
    
    // end kecamatan



    // Desaurahan
    public function desa(){
        $dataKec = $this->kecamatanModel->getKecamatan();
        $dataDesa = $this->DesaModel->getDesa();
        $data = [
            'title' => 'Desa',
            'dataKec' => $dataKec,
            'dataDesa' => $dataDesa,
        ];
        return view('daerah/desa', $data);
    }

    public function saveDesa(){
        $data = [
            'nama_desa' => $this->request->getPost('nama_desa'),
            'kecamatan_id' => $this->request->getPost('kecamatan_id')
        ];
        $this->DesaModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('Daerah/desa'));
    }

    public function updateDesa(){
        $id = $this->request->getPost('id_desa');
        $data = [
            'nama_desa' => $this->request->getPost('nama_desa'),
            'kecamatan_id' => $this->request->getPost('kecamatan_id')
        ];
        $this->DesaModel->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil diupdate');
        return redirect()->to(base_url('Daerah/desa'));
    }

    public function deleteDesa($id){
        $this->DesaModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('Daerah/desa'));
    }

    public function getDesaurahanByKecamatan(){
        $id_kec = $this->request->getPost('id');
        $data = $this->DesaModel->getDesaurahanByKecamatan($id_kec);
        echo json_encode($data);
    }


}

?>