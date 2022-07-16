<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AtractionVideo extends Migration
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
            ],
            'duration'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true
            ]
        ]);
        // Membuat tabel atraction


        // Membuat primary atraction
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('atraction_id', 'atraction', 'id');
        $this->forge->createTable('atraction_video', TRUE);
    }

    public function down()
    {
        // menghapus tabel atraction
        $this->forge->dropTable('atraction_video');
    }
}
