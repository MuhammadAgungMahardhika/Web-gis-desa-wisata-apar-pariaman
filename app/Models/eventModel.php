<?php


namespace App\Models;

use CodeIgniter\Model;

class eventModel extends Model
{

    protected $table = 'event';
    protected $table_gallery = 'event_gallery';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'schedule', 'price', 'contact_person', 'description', 'lat', 'lng', 'geom'];

    public function getEvents()
    {
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $columns = "
        {$this->table}.id,
        {$this->table}.name,
        {$this->table}.date_start,
        {$this->table}.date_end,
        {$this->table}.time_start,
        {$this->table}.time_end,
        {$this->table}.price,
        {$this->table}.contact_person,
        {$this->table}.description";

        $query = $this->db->table($this->table)
            ->select("{$columns},{$coords}")
            ->get()->getResult();

        return $query;
    }
    public function getEvent($id)
    {
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $columns = "
        {$this->table}.id,
        {$this->table}.name,
        {$this->table}.date_start,
        {$this->table}.date_end,
        {$this->table}.time_start,
        {$this->table}.time_end,
        {$this->table}.price,
        {$this->table}.contact_person,
        {$this->table}.description";

        $query = $this->db->table($this->table)
            ->select("{$columns},{$coords}")
            ->where($this->primaryKey, $id)
            ->get();
        return $query;
    }

    public function getEventByName($name)
    {
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
        $columns = "
        {$this->table}.id,
        {$this->table}.name,
        {$this->table}.date_start,
        {$this->table}.date_end,
        {$this->table}.time_start,
        {$this->table}.time_end,
        {$this->table}.price,
        {$this->table}.contact_person,
        {$this->table}.description";

        $query = $this->db->table($this->table)
            ->select("{$columns},{$coords}")
            ->like('name', $name, 'both')
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
    public function getGallery($id)
    {
        $query = $this->db->table($this->table_gallery)->select('url')->where('event_id', $id)->get();
        return $query;
    }
    public function getRadiusValue($lng, $lat, $radius)
    {
        $radiusnew = $radius / 1000;
        $coords = "ST_Y(ST_Centroid({$this->table}.geom)) AS lat ,ST_X(ST_Centroid({$this->table}.geom)) AS lng ";
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
          {$this->table}.date_start,
          {$this->table}.date_end,
          {$this->table}.time_start,
          {$this->table}.time_end,
          {$this->table}.price,
          {$this->table}.contact_person,
          {$this->table}.description";
        $query = $this->db->table($this->table)
            ->select("{$columns},{$jarak} as jarak,{$coords}")
            ->having(['jarak <=' => $radiusnew])->get();
        return $query;
    }
}
