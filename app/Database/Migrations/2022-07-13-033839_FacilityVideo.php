<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FacilityVideo extends Migration
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
            ],
            'duration'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true
            ]
        ]);
        // Membuat tabel facility


        // Membuat primary facility
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('facility_id', 'facility', 'id');
        $this->forge->createTable('facility_video', TRUE);
    }

    public function down()
    {
        // menghapus tabel facility
        $this->forge->dropTable('facility_video');
    }
}
