<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailMenu extends Migration
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
            'menu_id'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 8,
                'null'           => false
            ],
            'culinary_place_id'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 8,
                'null'           => false
            ]
        ]);

        // Membuat primary facility
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('menu_id', 'menu', 'id');
        $this->forge->addForeignKey('culinary_place_id', 'culinary_place', 'id');
        $this->forge->createTable('detail_menu', TRUE);
    }

    public function down()
    {
        // menghapus tabel facility
        $this->forge->dropTable('detail_menu');
    }
}
