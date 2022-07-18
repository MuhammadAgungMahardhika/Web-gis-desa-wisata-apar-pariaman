<?php


namespace App\Models;

use CodeIgniter\Model;

class atractionModel extends Model
{
    protected $table = 'atraction';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'status', 'price', 'contact_person', 'description', 'lat', 'lng', 'geom'];

    public function getAtractions()
    {
        $geoJson = "ST_AsGeoJSON({$this->table}.geom) AS geoJSON";
        $columns = "{$this->table}.id,{$this->table}.name,{$this->table}.status,{$this->table}.price,{$this->table}.contact_person,{$this->table}.description,{$this->table}.lat,{$this->table}.lng";
        $query = $this->db->table($this->table)
            ->select("{$columns},{$geoJson}")
            ->get()->getResult();
        return $query;
    }
    public function getAtraction($id)
    {
        $geoJson = "ST_AsGeoJSON({$this->table}.geom) AS geoJSON";
        $columns = "{$this->table}.id,{$this->table}.name,{$this->table}.status,{$this->table}.price,{$this->table}.contact_person,{$this->table}.description,{$this->table}.lat,{$this->table}.lng";

        $query = $this->db->table($this->table)
            ->select("{$columns},{$geoJson}")
            ->where($this->primaryKey, $id)
            ->get();
        return $query;
    }
    public function addAtraction($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function deleteAtraction($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
}
