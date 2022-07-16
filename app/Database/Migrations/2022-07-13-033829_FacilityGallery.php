<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FacilityGallery extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel facility
        $this->forge->addField([
            'id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 8,
                'null'           => false
            ],
            'facility_id'      => [
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

        // Membuat primary facility
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('facility_id', 'facility', 'id');
        $this->forge->createTable('facility_gallery', TRUE);
    }

    public function down()
    {
        // menghapus tabel facility
        $this->forge->dropTable('facility_gallery');
    }
}
