<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReviewAtraction extends Migration
{
    public function up()
    { // Membuat kolom/field untuk tabel atraction
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'null'           => false,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'           => 'INT',
                'null'           => false,
                'constraint'     => 5,
                'unsigned'       => true
            ],
            'atraction_id'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 8,
                'null'           => false
            ],
            'comment'           => [
                'type'           => 'TEXT',
                'null'           => true
            ],
            'rating'           => [
                'type'           => 'INT',
                'null'           => false
            ],
            'created_date datetime default current_timestamp'
        ]);

        // Membuat primary atraction
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->addForeignKey('atraction_id', 'atraction', 'id');
        $this->forge->createTable('review_atraction', TRUE);
    }

    public function down()
    {
        // menghapus tabel atraction
        $this->forge->dropTable('review_atraction');
    }
}
