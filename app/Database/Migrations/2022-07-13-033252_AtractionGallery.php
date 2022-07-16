<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AtractionGallery extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel atraction
        $this->forge->addField([
            'id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 8,
                'null'           => false
            ],
            'atraction_id'      => [
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

        // Membuat primary atraction
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('atraction_id', 'atraction', 'id');
        $this->forge->createTable('atraction_gallery', TRUE);
    }

    public function down()
    {
        // menghapus tabel atraction
        $this->forge->dropTable('atraction_gallery');
    }
}
