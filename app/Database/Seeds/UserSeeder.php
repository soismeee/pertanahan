<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $dataadmin = [
            'nama_user' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'level' => 'admin',
            'email_verified' => 1,
            ];
     
            $this->db->table('users')->insert($dataadmin);
            
        $dataloket = [
            'nama_user' => 'Loket',
            'email' => 'loket@gmail.com',
            'password' => '12345',
            'level' => 'loket',
            'email_verified' => 1,
            ];
     
            $this->db->table('users')->insert($dataloket);
    }
}
