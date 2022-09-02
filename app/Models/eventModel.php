<?php


namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class eventModel extends Model
{
    protected $table = 'event';
    protected $table_gallery = 'event_gallery';
    protected $table_video = 'event_video';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'schedule', 'price', 'contact_person', 'description', 'lat', 'lng', 'geom'];
    protected $columns = '
    event.id,
    event.name,
    event.date_start,
    event.date_end,
    event.time_start,
    event.time_end,
    event.price,
    event.contact_person,
    event.description,
    event.video_url';
    protected $coords    = "ST_Y(ST_Centroid(event.geom)) AS lat ,ST_X(ST_Centroid(event.geom)) AS lng ";
    protected $geom_area = "ST_AsGeoJSON(event.geom_area) AS geoJSON";

    public function getEvents()
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns},{$this->coords},{$this->geom_area}")
            ->get()->getResult();
        return $query;
    }
    public function getEvent($id)
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns},{$this->coords},{$this->geom_area}")
            ->where($this->primaryKey, $id)
            ->get();
        return $query;
    }

    public function getEventByName($name)
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns},{$this->coords},{$this->geom_area}")
            ->like('name', $name, 'both')
            ->get();
        return $query;
    }

    public function getEventByDate($date_1, $date_2)
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns},{$this->coords},{$this->geom_area}")
            ->where("(date_start BETWEEN '{$date_1}' AND '{$date_2}') 
            OR (date_end BETWEEN '{$date_1}' AND '{$date_2}' ) 
            OR (date_start <= '{$date_1}' 
            AND date_end >= '{$date_2}')")
            ->get();
        return $query;
    }
    public function getEventByRate($rate)
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns},{$this->coords},{$this->geom_area},ceil(avg(rating.rating)) as avg_rating")
            ->join('rating', 'rating.event_id = event.id')
            ->groupBy('event.id')
            ->having("avg_rating = $rate")
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
    public function addEvent($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updateEvent($id, $data, $lng, $lat, $geojson = null)
    {
        $query = $this->db->table($this->table)
            ->where('event.id', $id)
            ->update($data);
        $update = $this->db->table($this->table)
            ->set('geom_area', "ST_GeomFromGeoJSON('{$geojson}')", false)
            ->set('geom', "ST_PointFromText('POINT($lng $lat)')", false)
            ->where('event.id', $id)
            ->update();
        return $query && $update;
    }
    public function deleteEvent($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
    // ---------------------------------Gallery APi------------------------
    public function get_new_id_api()
    {
        $lastId = $this->db->table($this->table_gallery)->select('id')->orderBy('id', 'ASC')->get()->getLastRow('array');
        $count = (int)substr($lastId['id'], 3);
        $id = sprintf('IMG%04d', $count + 1);
        return $id;
    }
    public function getGallery($id)
    {
        $query = $this->db->table($this->table_gallery)->select('url')->where('event_id', $id)->get();
        return $query;
    }
    public function addGallery($id = null, $data = null)
    {
        $query = false;
        foreach ($data as $gallery) {
            $new_id = $this->get_new_id_api();
            $content = [
                'id' => $new_id,
                'event_id' => $id,
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
        return $this->db->table($this->table_gallery)->delete(['event_id' => $id]);
    }
}
