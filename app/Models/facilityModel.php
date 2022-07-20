<?php


namespace App\Models;

use CodeIgniter\Model;

class facilityModel extends Model
{
    protected $table = 'facility';
    protected $table_gallery = 'facility_gallery';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'lat', 'lng', 'geom'];
    public function getFacilities()
    {
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $columns = "
        {$this->table}.id,
        {$this->table}.name,
        {$this->table}.employe,
        {$this->table}.open,
        {$this->table}.close,
        {$this->table}.contact_person,
        {$this->table}.description";
        $query = $this->db->table($this->table)
            ->select("{$columns},{$coords}")
            ->get()->getResult();
        return $query;
    }
    public function getFacility($id)
    {
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $columns = "
        {$this->table}.id,
        {$this->table}.name,
        {$this->table}.employe,
        {$this->table}.open,
        {$this->table}.close,
        {$this->table}.contact_person,
        {$this->table}.description";

        $query = $this->db->table($this->table)
            ->select("{$columns},{$coords}")
            ->where($this->primaryKey, $id)
            ->get();
        return $query;
    }
    public function addFacility($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function deleteFacility($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
    public function getGallery($id)
    {
        $query = $this->db->table($this->table_gallery)->select('url')->where('facility_id', $id)->get();
        return $query;
    }
}
