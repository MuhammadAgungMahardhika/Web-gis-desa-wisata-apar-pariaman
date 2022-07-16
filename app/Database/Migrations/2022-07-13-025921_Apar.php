<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Apar extends Migration
{

    public function up()
    {
        // Membuat kolom/field untuk tabel apar
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
            'type_of_tourism'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'null'           => true
            ],
            'address' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true
            ],
            'contact_person'      => [
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
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true
            ]
        ]);

        // Membuat primary apar
        $this->forge->addKey('id', TRUE);

        // Membuat tabel apar
        $this->forge->createTable('apar', TRUE);
    }

    public function down()
    {
        // menghapus tabel apar
        $this->forge->dropTable('apar');
    }
}
