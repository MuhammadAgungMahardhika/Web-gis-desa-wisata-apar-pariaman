<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SouvenirPlaceVideo extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel souvenir_place
        $this->forge->addField([
            'id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 8,
                'null'           => false
            ],
            'souvenir_place_id'      => [
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
        // Membuat tabel souvenir_place


        // Membuat primary souvenir_place
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('souvenir_place_id', 'souvenir_place', 'id');
        $this->forge->createTable('souvenir_place_video', TRUE);
    }

    public function down()
    {
        // menghapus tabel souvenir_place
        $this->forge->dropTable('souvenir_place_video');
    }
}
