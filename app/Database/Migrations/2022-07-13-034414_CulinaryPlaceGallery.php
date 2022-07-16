<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CulinaryPlaceGallery extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel culinary_place
        $this->forge->addField([
            'id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 8,
                'null'           => false
            ],
            'culinary_place_id'      => [
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

        // Membuat primary culinary_place
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('culinary_place_id', 'culinary_place', 'id');
        $this->forge->createTable('culinary_place_gallery', TRUE);
    }

    public function down()
    {
        // menghapus tabel culinary_place
        $this->forge->dropTable('culinary_place_gallery');
    }
}
