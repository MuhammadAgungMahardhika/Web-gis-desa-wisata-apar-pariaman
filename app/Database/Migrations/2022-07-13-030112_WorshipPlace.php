<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WorshipPlace extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 8,
                'null'           => false
            ],
            'name'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => false
            ],
            'category'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'null'           => true
            ],
            'description'      => [
                'type'           => 'TEXT',
                'null'           => true
            ],
            'lat'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true
            ],
            'lng'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true
            ],
            'geom'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true
            ]
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel 
        $this->forge->createTable('worship_place', TRUE);
    }

    public function down()
    {
        // menghapus tabel 
        $this->forge->dropTable('worship_place');
    }
}
