<?php


namespace App\Models;

use CodeIgniter\Model;

class culinaryPlaceModel extends Model
{
    protected $table = 'culinary_place';
    protected $table_gallery = 'culinary_place_gallery';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'lat', 'lng', 'geom'];
    public function getCulinaryPlaces()
    {
        $query = $this->db->table($this->table)
            ->select('*')
            ->get()->getResult();
        return $query;
    }
    public function getCulinaryPlace($id)
    {
        $query = $this->db->table($this->table)
            ->where($this->primaryKey, $id)
            ->get();
        return $query;
    }
    public function addCulinaryPlace($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function deleteCulinaryPlace($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
    public function getGallery($id)
    {
        $query = $this->db->table($this->table_gallery)->select('url')->where('culinary_place_id', $id)->get();
        return $query;
    }
}
