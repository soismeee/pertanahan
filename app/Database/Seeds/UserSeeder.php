<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama_user' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'level' => 'admin',
            ];
     
            $this->db->table('users')->insert($data);
    }
}
