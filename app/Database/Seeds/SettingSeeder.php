<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama' => 'Badan Pertanahan Nasional (BPN) Kabupaten Batang',
            'email' =>  'kantahbatang@gmail.com',
            'telepon' => '012345678',
            'alamat' => 'Kauman Batang',
            'home' =>
            '<p><strong>VISI</strong><br />
                Terwujudnya Penataan Ruang dan Pengelolaan Pertanahan yang Terpercaya dan Berstandar Dunia dalam Melayani Masyarakat untuk Mendukung Tercapainya: &quot;Indonesia Maju yang Berdaulat, Mandiri dan Berkepribadian Berlandaskan Gotong Royong&quot;</p>

                <p>&nbsp;</p>

                <p><strong>MISI</strong><br />
                Menyelenggarakan Penataan Ruang dan Pengelolaan Pertanahan yang Produktif, Berkelanjutan dan Berkeadilan;<br />
                Menyelenggarakan Pelayanan Pertanahan dan Penataan Ruang yang Berstandar Dunia.<br />
                &nbsp;</p>

                <p><strong>MOTO</strong><br />
                Melayani, Profesional, Terpercaya</p>
            ',
            ];
     
            $this->db->table('setting')->insert($data);
    }
}
