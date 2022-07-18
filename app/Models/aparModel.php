<?php


namespace App\Models;

use CodeIgniter\Model;

class aparModel extends Model
{
    protected $table = 'apar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'type_of_tourism', 'address', 'contact_person', 'description', 'lat', 'lng', 'geom'];
    public function getApar()
    {
        $query = $this->db->table($this->table)
            ->select('*')
            ->get()->getRow();
        return $query;
    }
    public function editApar($id)
    {
        $query = $this->db->table($this->table)
            ->where($this->primaryKey, $id)
            ->get()->getRow();
        return $query;
    }
}
