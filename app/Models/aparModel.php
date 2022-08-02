<?php


namespace App\Models;

use CodeIgniter\Model;

class aparModel extends Model
{
    protected $table = 'apar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'type_of_tourism', 'address', 'contact_person', 'description', 'lat', 'lng', 'geom', 'geom_area'];
    public function getApar()
    {
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $geom_area = "ST_AsGeoJSON({$this->table}.geom_area) AS geoJSON";
        $columns = "
        {$this->table}.id,
        {$this->table}.name,
        {$this->table}.status,
        {$this->table}.open,
        {$this->table}.close,
        {$this->table}.ticket,
        {$this->table}.type_of_tourism,
        {$this->table}.address,
        {$this->table}.contact_person,
        {$this->table}.description";

        $query = $this->db->table($this->table)
            ->select("{$columns},{$geom_area},{$coords}")
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
