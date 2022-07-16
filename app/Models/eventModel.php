<?php


namespace App\Models;

use CodeIgniter\Model;

class eventModel extends Model
{

    protected $table = 'event';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'schedule', 'price', 'contact_person', 'description', 'lat', 'lng', 'geom'];

    public function getEvents()
    {
        $query = $this->db->table($this->table)
            ->select('*')
            ->get()->getResult();
        return $query;
    }
    public function getEvent($id)
    {
        $query = $this->db->table($this->table)
            ->where($this->primaryKey, $id)
            ->get();
        return $query;
    }
    public function addEvent($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function deleteEvent($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
}
