<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelurahan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_desa' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_desa' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kecamatan_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ]
        ]);
        $this->forge->addKey('id_desa', true);
        $this->forge->addForeignKey('kecamatan_id', 'kecamatan', 'id_kecamatan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('desa');
    }

    public function down()
    {
        $this->forge->dropTable('desa');
    }
}
