<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailProduct extends Migration
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
            'product_id'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 8,
                'null'           => false
            ],
            'souvenir_place_id'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 8,
                'null'           => false
            ]
        ]);

        // Membuat primary facility
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('product_id', 'product', 'id');
        $this->forge->addForeignKey('souvenir_place_id', 'souvenir_place', 'id');
        $this->forge->createTable('detail_product', TRUE);
    }

    public function down()
    {
        // menghapus tabel facility
        $this->forge->dropTable('detail_product');
    }
}
