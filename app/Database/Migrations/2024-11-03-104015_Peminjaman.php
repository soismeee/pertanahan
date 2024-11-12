<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peminjaman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peminjaman' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'buku_tanah_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'jenis_permohonan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'notaris' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pinjam', 'proses', 'selesai', 'tolak'],
                'default'    => 'pinjam',
            ],
            'tanggal_peminjaman' => [
                'type'    => 'DATE',
                'null'    => true,
            ],
            'tanggal_pengembalian' => [
                'type'    => 'DATE',
                'null'    => true,
            ]
        ]);
        $this->forge->addKey('id_peminjaman', true);
        $this->forge->addForeignKey('user_id', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('buku_tanah_id', 'buku_tanah', 'id_buku_tanah', 'CASCADE', 'CASCADE');
        $this->forge->createTable('peminjaman');
    }

    public function down()
    {
        $this->forge->dropTable('peminjaman');
    }
}
