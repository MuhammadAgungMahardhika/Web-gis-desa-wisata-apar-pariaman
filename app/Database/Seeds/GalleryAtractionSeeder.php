<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GalleryAtractionSeeder extends Seeder
{
    public function run()
    {

        $data = [
            'id' => 'GA01',
            'atraction_id'    => 'A01',
            'url' => '1.jpg'
        ];
        // Using Query Builder
        $this->db->table('atraction_gallery')->insert($data);
    }
}
