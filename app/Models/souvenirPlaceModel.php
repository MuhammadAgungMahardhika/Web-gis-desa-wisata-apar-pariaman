<?php


namespace App\Models;

use CodeIgniter\Model;

class souvenirPlaceModel extends Model
{
    protected $table = 'souvenir_place';
    protected $table_gallery = 'souvenir_place_gallery';
    protected $table_detail_product = 'detail_product';
    protected $table_product = 'product';
    protected $primaryKey = 'id';
    public function getSouvenirPlaces()
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
    public function getSouvenirPlace($id)
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
    public function addSouvenirPlace($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function deleteSouvenirPlace($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
    public function getGallery($id)
    {
        $query = $this->db->table($this->table_gallery)->select('url')->where('souvenir_place_id', $id)->get();
        return $query;
    }

    public function getProduct($id)
    {
        $query = $this->db->table($this->table_product)->select('*')
            ->join($this->table_detail_product, 'product_id = product.id')
            ->where('souvenir_place_id', $id)->get();
        return $query;
    }

    public function getRadiusValue($lng, $lat, $radius)
    {
        $query = $this->db->table($this->table)
            ->select("id, name, ST_Y(ST_CENTROID(geom)) AS lat,
            ST_X(ST_CENTROID(geom)) AS lng")
            ->where("st_intersects(st_centroid(souvenir_place.geom),
            ST_buffer(ST_GeomFromText(concat('POINT($lng $lat)')),
            0.0009*$radius))=1")->get();
        return $query;
    }
}
