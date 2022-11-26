<?php


namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class facilityModel extends Model
{
    protected $table = 'facility';
    protected $table_gallery = 'facility_gallery';
    protected $columns = 'id,name,area_size,open,close,description';
    protected $coords = "ST_Y(ST_Centroid(facility.geom)) AS lat ,ST_X(ST_Centroid(facility.geom)) AS lng ";
    protected $geom_area = "ST_AsGeoJSON(facility.geom_area) AS geoJSON";

    public function get_new_id()
    {
        $lastId = $this->db->table($this->table)->select('id')->orderBy('id', 'ASC')->get()->getLastRow('array');
        if ($lastId != null) {
            $count = (int)substr($lastId['id'], 0);
            $id = sprintf('%02d', $count + 1);
            return $id;
        } else {
            return '01';
        }
    }
    public function getFacilities()
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns},{$this->coords},{$this->geom_area}")
            ->get()->getResult();
        return $query;
    }
    public function getFacility($id)
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns},{$this->coords},{$this->geom_area}")
            ->where('facility.id', $id)
            ->get();
        return $query;
    }
    public function getRadiusValue($lng, $lat, $radius)
    {
        $radiusnew = $radius / 1000;
        $jarak = "(
            6371 * acos (
              cos ( radians($lat) )
              * cos( radians( ST_Y(ST_CENTROID(geom)) ) )
              * cos( radians( ST_X(ST_CENTROID(geom)) ) - radians($lng) )
              + sin ( radians($lat) )
              * sin( radians( ST_Y(ST_CENTROID(geom)) ) )
            )
          )";
        $query = $this->db->table($this->table)
            ->select("{$this->columns},{$this->coords},{$this->geom_area},{$jarak} as jarak")
            ->having(['jarak <=' => $radiusnew])->get();
        return $query;
    }
    // ----------------------------------------------Admin--------------------------------------
    public function addFacility($id, $data, $lng, $lat, $geojson = null)
    {
        $query = $this->db->table($this->table)->insert($data);
        if ($query) {
            $spasial = $this->db->table($this->table)
                ->set('geom_area', "ST_GeomFromGeoJSON('{$geojson}')", false)
                ->set('geom', "ST_PointFromText('POINT($lng $lat)')", false)
                ->where('facility.id', $id)
                ->update();
        }
        return $query && $spasial;
    }
    public function updateF($id, $data, $lng, $lat, $geojson = null)
    {
        $query = $this->db->table($this->table)
            ->where('facility.id', $id)
            ->update($data);
        $update = $this->db->table($this->table)
            ->set('geom_area', "ST_GeomFromGeoJSON('{$geojson}')", false)
            ->set('geom', "ST_PointFromText('POINT($lng $lat)')", false)
            ->where('facility.id', $id)
            ->update();
        return $query && $update;
    }
    public function deleteFacility($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
    public function getTotal()
    {
        $query =  $this->db->table($this->table)
            ->selectCount("id")->get()
            ->getRow();
        return $query;
    }
    // ---------------------------------Gallery APi------------------------
    public function get_new_id_api()
    {
        $lastId = $this->db->table($this->table_gallery)->select('id')->orderBy('id', 'ASC')->get()->getLastRow('array');
        if ($lastId != null) {
            $count = (int)substr($lastId['id'], 0);
            $id = sprintf('%02d', $count + 1);
            return $id;
        } else {
            return '01';
        }
    }
    public function getGallery($id)
    {
        $query = $this->db->table($this->table_gallery)->select('url')->where('facility_id', $id)->get();
        return $query;
    }
    public function addGallery($id = null, $data = null)
    {
        $query = false;
        foreach ($data as $gallery) {
            $new_id = $this->get_new_id_api();
            $content = [
                'id' => $new_id,
                'facility_id' => $id,
                'url' => $gallery,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ];
            $query = $this->db->table($this->table_gallery)->insert($content);
        }
        return $query;
    }
    public function updateGallery($id = null, $data = null)
    {
        $queryDel = $this->deleteGallery($id);
        foreach ($data as $key => $value) {
            if (empty($value)) {
                unset($data[$key]);
            }
        }
        $queryIns = $this->addGallery($id, $data);
        return $queryDel && $queryIns;
    }
    public function deleteGallery($id = null)
    {
        return $this->db->table($this->table_gallery)->delete(['facility_id' => $id]);
    }
}
