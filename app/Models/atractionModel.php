<?php


namespace App\Models;

use CodeIgniter\Model;

class atractionModel extends Model
{
    protected $table = 'atraction';
    protected $table_gallery = 'atraction_gallery';

    protected $primaryKey = 'atraction.id';
    protected $pk_gallery = 'atraction_gallery.id';

    protected $allowedFields = ['name', 'status', 'price', 'contact_person', 'description', 'lat', 'lng', 'geom'];

    public function getAtractions()
    {
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $geom_area = "ST_AsGeoJSON({$this->table}.geom_area) AS geoJSON";
        $columns = "
        {$this->table}.id,
        {$this->table}.name,
        {$this->table}.employe,
        {$this->table}.price,
        {$this->table}.contact_person,
        {$this->table}.description";

        $query = $this->db->table($this->table)
            ->select("{$columns},{$coords},{$geom_area}")
            ->get()->getResult();
        return $query;
    }
    public function getAtraction($id)
    {
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $geom_area = "ST_AsGeoJSON({$this->table}.geom_area) AS geoJSON";
        $columns = "
        {$this->table}.id,
        {$this->table}.name,
        {$this->table}.employe,
        {$this->table}.price,
        {$this->table}.contact_person,
        {$this->table}.description";

        $query = $this->db->table($this->table)
            ->select("{$columns},{$coords},{$geom_area}")
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

    public function getGallery($id)
    {
        $query = $this->db->table($this->table_gallery)->select('url')->where('atraction_id', $id)->get();
        return $query;
    }

    public function getRadiusValue($lng, $lat, $radius)
    {
        $query = $this->db->table($this->table)
            ->select("id, name, ST_Y(ST_CENTROID(geom)) AS lat,
            ST_X(ST_CENTROID(geom)) AS lng")
            ->where("st_intersects(st_centroid(atraction.geom),
            ST_buffer(ST_GeomFromText(concat('POINT($lng $lat)')),
            0.0009*$radius))=1")->get();
        return $query;
    }
}
