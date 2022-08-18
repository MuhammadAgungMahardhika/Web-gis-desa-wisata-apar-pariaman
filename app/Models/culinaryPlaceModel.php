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
    // public function getMenu($id)
    // {
    //     $query = $this->db->table($this->table_menu)->select('*')
    //         ->join($this->table_detail_menu, 'menu_id = menu.id')
    //         ->where('culinary_place_id', $id)->get();
    //     return $query;
    // }

    public function getRadiusValue($lng, $lat, $radius)
    {
        $radiusnew = $radius / 1000;
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $geom_area = "ST_AsGeoJSON({$this->table}.geom_area) AS geoJSON";
        $jarak = "(
            6371 * acos (
              cos ( radians($lat) )
              * cos( radians( ST_Y(ST_CENTROID(geom)) ) )
              * cos( radians( ST_X(ST_CENTROID(geom)) ) - radians($lng) )
              + sin ( radians($lat) )
              * sin( radians( ST_Y(ST_CENTROID(geom)) ) )
            )
          )";
        $columns = "  
        {$this->table}.id,
        {$this->table}.name,
        {$this->table}.owner,
        {$this->table}.open,
        {$this->table}.close,
        {$this->table}.contact_person,
        {$this->table}.description";
        $query = $this->db->table($this->table)
            ->select("{$columns},{$jarak} as jarak,{$coords},{$geom_area}")
            ->having(['jarak <=' => $radiusnew])->get();
        return $query;
    }
}
