<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Atraction extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 8,
                'null'           => false
            ],
            'name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => false
            ],
            'status'       => [
                'type'           => 'INT',
                'null'           => false
            ],
            'price'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true
            ],
            'contact_person' => [
                'type'           => 'VARCHAR',
                'constraint'     => 13,
                'null'           => true
            ],
            'description'      => [
                'type'           => 'TEXT',
                'null'           => true
            ],
            'lat'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => false
            ],
            'lng'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => false
            ],
            'geom'      => [
                'type'           => 'GEOMETRY',
                'null'           => true
            ]
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel 
        $this->forge->createTable('atraction', TRUE);
    }

    public function down()
    {
        // menghapus tabel 
        $this->forge->dropTable('atraction');
    }
}
