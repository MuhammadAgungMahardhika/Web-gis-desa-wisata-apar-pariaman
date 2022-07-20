<?php


namespace App\Models;

use CodeIgniter\Model;

class worshipPlaceModel extends Model
{
    protected $table = 'worship_place';
    protected $table_gallery = 'worship_place_gallery';

    protected $primaryKey = 'id';
    public function getWorshipPlaces()
    {
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $columns = "
        {$this->table}.id,
        {$this->table}.name,
        {$this->table}.category,
        {$this->table}.open,
        {$this->table}.close,
        {$this->table}.building_size,
        {$this->table}.capacity,
        {$this->table}.description";
        $query = $this->db->table($this->table)
            ->select("{$columns},{$coords}")
            ->get()->getResult();
        return $query;
    }
    public function getWorshipPlace($id)
    {
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $columns = "
        {$this->table}.id,
        {$this->table}.name,
        {$this->table}.category,
        {$this->table}.open,
        {$this->table}.close,
        {$this->table}.building_size,
        {$this->table}.capacity,
        {$this->table}.description";

        $query = $this->db->table($this->table)
            ->select("{$columns},{$coords}")
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
    public function getGallery($id)
    {
        $query = $this->db->table($this->table_gallery)->select('url')->where('worship_place_id', $id)->get();
        return $query;
    }
}
