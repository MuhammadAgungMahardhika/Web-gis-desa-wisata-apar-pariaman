<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SouvenirPlaceGallery extends Migration
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
            ]
        ]);

        // Membuat primary souvenir_place
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('souvenir_place_id', 'souvenir_place', 'id');
        $this->forge->createTable('souvenir_place_gallery', TRUE);
    }

    public function down()
    {
        // menghapus tabel souvenir_place
        $this->forge->dropTable('souvenir_place_gallery');
    }
}
