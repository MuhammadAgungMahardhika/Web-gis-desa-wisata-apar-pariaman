<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AtractionSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id' => 'A09',
            'name'    => 'tesSeeder',
            'status'    => 3,
            'price'    => 200,
            'contact_person'    => 6281373517899,
            'description'    => 'okee',
            'lat'    => '-0.601102',
            'lng'    => '100.108668',
            // 'geom'   => 'ST_PolygonFromText("POLYGON((0 0,10 0,10 10,0 10,0 0),(5 5,7 5,7 7,5 7, 5 5))'

        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('atraction')->insert($data);
    }
}
