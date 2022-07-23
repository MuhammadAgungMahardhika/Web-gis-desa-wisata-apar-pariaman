<?php


namespace App\Models;

use CodeIgniter\Model;

class culinaryPlaceModel extends Model
{
    protected $table = 'culinary_place';
    protected $table_gallery = 'culinary_place_gallery';
    protected $table_detail_menu = 'detail_menu';
    protected $table_menu = 'menu';

    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'lat', 'lng', 'geom'];
    public function getCulinaryPlaces()
    {
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $columns = "
        {$this->table}.id,
        {$this->table}.name,
        {$this->table}.owner,
        {$this->table}.open,
        {$this->table}.close,
        {$this->table}.contact_person,
        {$this->table}.description";
        $query = $this->db->table($this->table)
            ->select("{$columns},{$coords}")
            ->get()->getResult();
        return $query;
    }
    public function getCulinaryPlace($id)
    {
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $columns = "
        {$this->table}.id,
        {$this->table}.name,
        {$this->table}.owner,
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
    public function getMenu($id)
    {
        $query = $this->db->table($this->table_menu)->select('*')
            ->join($this->table_detail_menu, 'menu_id = menu.id')
            ->where('culinary_place_id', $id)->get();
        return $query;
    }

    public function getRadiusValue($lng, $lat, $radius)
    {
        $radiusnew = $radius / 1000;
        $query = $this->db->table($this->table)
            ->select("id, name, ST_Y(ST_CENTROID(geom)) AS lat,
            ST_X(ST_CENTROID(geom)) AS lng")
            ->where("st_intersects(st_centroid(culinary_place.geom),
            ST_buffer(ST_GeomFromText(concat('POINT($lng $lat)')),
            0.0009*$radiusnew))=1")->get();
        return $query;
    }
}
