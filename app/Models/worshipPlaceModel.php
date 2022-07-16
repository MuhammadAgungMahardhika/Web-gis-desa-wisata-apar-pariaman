<?php


namespace App\Models;

use CodeIgniter\Model;

class worshipPlaceModel extends Model
{
    protected $table = 'worship_place';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'lat', 'lng', 'geom'];
    public function getWorshipPlaces()
    {
        $query = $this->db->table($this->table)
            ->select('*')
            ->get()->getResult();
        return $query;
    }
    public function getWorshipPlace($id)
    {
        $query = $this->db->table($this->table)
            ->where($this->primaryKey, $id)
            ->get();
        return $query;
    }
    public function addWorshipPlace($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function deleteWorshipPlace($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
}
