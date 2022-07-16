<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AparVideo extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel apar
        $this->forge->addField([
            'id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 8,
                'null'           => false
            ],
            'apar_id'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 8,
                'null'           => false
            ],
            'url'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => false
            ],
            'duration'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true
            ]
        ]);
        // Membuat tabel apar


        // Membuat primary apar
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('apar_id', 'apar', 'id');
        $this->forge->createTable('apar_video', TRUE);
    }

    public function down()
    {
        // menghapus tabel apar
        $this->forge->dropTable('apar_video');
    }
}
