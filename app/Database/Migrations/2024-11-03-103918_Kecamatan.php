<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kecamatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kecamatan' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kecamatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ]
        ]);
        $this->forge->addKey('id_kecamatan', true);
        $this->forge->createTable('kecamatan');
    }

    public function down()
    {
        $this->forge->dropTable('kecamatan');
    }
}
