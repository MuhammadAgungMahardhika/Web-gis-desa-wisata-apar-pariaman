<?php

namespace App\Models;

use CodeIgniter\Model;

class atractionModel extends Model
{
    protected $table = 'atraction_gallery';
    protected $primaryKey = 'id';

    public function getAtractionGallery()
    {
        $query = $this->db->table($this->table)
            ->select('url')
            ->get();
        return $query;
    }
}
