<?php


namespace App\Models;

use CodeIgniter\Model;

class atractionModel extends Model
{
    protected $table = 'atraction';
    protected $table_category = 'category_atraction';
    protected $table_gallery = 'atraction_gallery';

    protected $primaryKey = 'atraction.id';
    protected $pk_gallery = 'atraction_gallery.id';

    protected $allowedFields = ['name', 'employe', 'open', 'close', 'price', 'contact_person', 'description', 'lat', 'lng', 'geom'];

    public function getAtractions()
    {
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $geom_area = "ST_AsGeoJSON({$this->table}.geom_area) AS geoJSON";
        $columns = "
        {$this->table}.id,
        {$this->table}.name,
        {$this->table_category}.category,
        {$this->table}.open,
        {$this->table}.close,
        {$this->table}.employe,
        {$this->table}.price,
        {$this->table}.contact_person,
        {$this->table}.description";

        $query = $this->db->table($this->table)
            ->select("{$columns},{$coords},{$geom_area}")
            ->join('category_atraction', 'category_atraction.id = atraction.category_id')
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
        {$this->table_category}.category,
        {$this->table}.open,
        {$this->table}.close,
        {$this->table}.employe,
        {$this->table}.price,
        {$this->table}.contact_person,
        {$this->table}.description";

        $query = $this->db->table($this->table)
            ->select("{$columns},{$coords},{$geom_area}")
            ->join('category_atraction', 'category_atraction.id = atraction.category_id')
            ->where($this->primaryKey, $id)
            ->get();
        return $query;
    }

    public function getAtractionByName($name)
    {
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $geom_area = "ST_AsGeoJSON({$this->table}.geom_area) AS geoJSON";
        $columns = "
        {$this->table}.id,
        {$this->table}.name,
        {$this->table_category}.category,
        {$this->table}.open,
        {$this->table}.close,
        {$this->table}.employe,
        {$this->table}.price,
        {$this->table}.contact_person,
        {$this->table}.description";

        $query = $this->db->table($this->table)
            ->select("{$columns},{$coords},{$geom_area}")
            ->join('category_atraction', 'category_atraction.id = atraction.category_id')
            ->like('name', $name, 'both')
            ->get();
        return $query;
    }
    public function getAtractionByRate($rate)
    {
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $geom_area = "ST_AsGeoJSON({$this->table}.geom_area) AS geoJSON";
        $columns = "
        {$this->table}.id,
        {$this->table}.name,
        {$this->table_category}.category,
        {$this->table}.open,
        {$this->table}.close,
        {$this->table}.employe,
        {$this->table}.price,
        {$this->table}.contact_person,
        {$this->table}.description";

        $query = $this->db->table($this->table)
            ->select("{$columns},{$coords},{$geom_area},ceil(avg(rating.rating)) as avg_rating")
            ->join('category_atraction', 'category_atraction.id = atraction.category_id')
            ->join('rating', 'rating.atraction_id = atraction.id')
            ->groupBy('atraction.id')
            ->having("avg_rating = $rate")
            ->get();
        return $query;
    }
    public function getAtractionByCategory($category)
    {
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $geom_area = "ST_AsGeoJSON({$this->table}.geom_area) AS geoJSON";
        $columns = "
        {$this->table}.id,
        {$this->table}.name,
        {$this->table_category}.category,
        {$this->table}.open,
        {$this->table}.close,
        {$this->table}.employe,
        {$this->table}.price,
        {$this->table}.contact_person,
        {$this->table}.description";

        $query = $this->db->table($this->table)
            ->select("{$columns},{$coords},{$geom_area}")
            ->join('category_atraction', 'category_atraction.id = atraction.category_id')
            ->where('category_atraction.category=', $category)
            ->get();
        return $query;
    }
    public function addAtraction($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updateAtraction($data, $id)
    {
        $query = $this->db->table($this->table)->where('atraction.id', $id)->update($data);
        return $query;
    }

    public function deleteAtraction($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }

    public function getCategory()
    {
        $query = $this->db->table($this->table_category)->select('category')->get();
        return $query;
    }
    public function getGallery($id)
    {
        $query = $this->db->table($this->table_gallery)->select('url')->where('atraction_id', $id)->get();
        return $query;
    }

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
        $columns = "{$this->table}.id,{$this->table}.name,{$this->table_category}.category";
        $query = $this->db->table($this->table)
            ->select("{$columns},{$jarak} as jarak,{$coords},{$geom_area}")
            ->join('category_atraction', 'category_atraction.id = atraction.category_id')
            ->having(['jarak <=' => $radiusnew])->get();
        return $query;
    }
}
