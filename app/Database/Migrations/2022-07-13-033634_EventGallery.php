<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EventGallery extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel event
        $this->forge->addField([
            'id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 8,
                'null'           => false
            ],
            'event_id'      => [
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

        // Membuat primary event
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('event_id', 'event', 'id');
        $this->forge->createTable('event_gallery', TRUE);
    }

    public function down()
    {
        // menghapus tabel event
        $this->forge->dropTable('event_gallery');
    }
}
