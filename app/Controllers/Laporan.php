<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;
use App\Models\UserModel;
use Dompdf\Dompdf;

class Laporan extends BaseController
{
    protected $PeminjamanModel;
    protected $userModel;

    public function __construct()
    {
        $this->PeminjamanModel = new PeminjamanModel();
        $this->userModel = new UserModel();
    }

    public function index()
    { 
        $data = [
            'title' => 'Laporan Manajemen',
            'statusPinjamAcc' => $this->PeminjamanModel->whereIn('status', ['proses', 'selesai'])->countAllResults(),
            'statusPinjamTolak' => $this->PeminjamanModel->where('status', 'tolak')->countAllResults(),
            'statusBTPinjam' => $this->PeminjamanModel->whereIn('status', ['pinjam', 'proses'])->countAllResults(),
            'statusBTKembali' => $this->PeminjamanModel->where('status', 'selesai')->countAllResults(),
            'karyawan' => $this->userModel->where('level', 'karyawan')->get()->getResultArray()
        ];
        // dd($data['pegawai']);
        return view('laporan/index', $data);
    }

    public function getLaporan(){
        $data = [
            'user_id' => $user_id = $this->request->getPost('user_id'),
            'tgl_awal' => $tgl_awal = $this->request->getPost('tgl_awal'),
            'tgl_akhir' => $tgl_akhir = $this->request->getPost('tgl_akhir'),
            'peminjaman' => $peminjaman = $this->PeminjamanModel->getLaporanPeminjaman($tgl_awal, $tgl_akhir, $user_id)
        ];

        return $this->response->setJSON($peminjaman);
    }

    public function v_print_laporan()
    {
        $user_id = $this->request->getPost('user_id');
        $tgl_awal = $this->request->getPost('tgl_awal');
        $tgl_akhir = $this->request->getPost('tgl_akhir');
        $data = [
            'title' => 'Laporan Manajemen Periode ' . date('d-m-Y', strtotime($tgl_awal)) . ' s.d. ' . date('d-m-Y', strtotime($tgl_akhir)),
            'laporan' => $this->PeminjamanModel->getLaporanPeminjaman($tgl_awal, $tgl_akhir, $user_id),
        ];
        return view('laporan/print_laporan', $data);
    }

    public function viewTableLaporan()
    {
        // Mengambil data laporan dari database
        $laporan = $this->PeminjamanModel->findAll(); // Misalnya, Anda mengambil semua data transaksi
        
        // Membuat tampilan tabel laporan
        $data = [
            'title' => 'Laporan Manajemen',
            'laporan' => $laporan
        ];

        // Mengembalikan v_wrapper dengan v_table_laporan sebagai konten utamanya
        return view('v_wrapper', $data); // Ubah 'v_wrapper' sesuai dengan nama file v_wrapper.php Anda
    
    // Load dompdf library
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($view);

        // Render PDF
        $dompdf->render();

        // Output PDF to browser
        $dompdf->stream('laporan.pdf', array('Attachment' => 0));
    }
}