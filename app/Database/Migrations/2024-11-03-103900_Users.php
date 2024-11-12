<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_user' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'level' => [
                'type'       => 'ENUM',
                'constraint' => ['admin', 'loket', 'karyawan'],
            ],
            'no_hp' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'    => true,
            ],
            'foto_user' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'    => true,
            ],
            'nip' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'    => true,
            ],
            'bagian' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'    => true,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ]
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
