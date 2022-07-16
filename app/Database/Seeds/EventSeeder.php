<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id' => 'E03',
            'name'    => 'tesSeeder',
            'status'    => 3,
            'price'    => 200,
            'contact_person'    => 6281373517899,
            'description'    => 'okee',
            'lat'    => '-0.601102',
            'lng'    => '100.108668'
            // 'geom'    => 'darth@theempire.com',
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('event')->insert($data);
    }
}
