<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BukuTahan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_buku_tanah' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_buku' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'jenis' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'luas' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'pemegang_hak' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'letak' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'desa_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
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
        $this->forge->addKey('id_buku_tanah', true);
        $this->forge->addForeignKey('desa_id', 'desa', 'id_desa', 'CASCADE', 'CASCADE');
        $this->forge->createTable('buku_tanah');
    }

    public function down()
    {
        $this->forge->dropTable('buku_tanah');
    }
}
