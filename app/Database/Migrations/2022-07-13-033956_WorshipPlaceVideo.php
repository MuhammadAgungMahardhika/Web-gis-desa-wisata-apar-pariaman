<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WorshipPlaceVideo extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel worship_place
        $this->forge->addField([
            'id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 8,
                'null'           => false
            ],
            'worship_place_id'      => [
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
        // Membuat tabel worship_place


        // Membuat primary worship_place
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('worship_place_id', 'worship_place', 'id');
        $this->forge->createTable('worship_place_video', TRUE);
    }

    public function down()
    {
        // menghapus tabel worship_place
        $this->forge->dropTable('worship_place_video');
    }
}
