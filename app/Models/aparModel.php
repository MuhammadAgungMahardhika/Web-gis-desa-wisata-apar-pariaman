<?php


namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class aparModel extends Model
{
    protected $table = 'apar';
    protected $table_gallery = 'apar_gallery';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'type_of_tourism', 'address', 'contact_person', 'description', 'lat', 'lng', 'geom'];
    public function getApar()
    {
        $coords = "ST_Y({$this->table}.geom) AS lat ,ST_X({$this->table}.geom) AS lng ";
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
        {$this->table}.facebook,
        {$this->table}.tiktok,
        {$this->table}.instagram,
        {$this->table}.youtube,
        {$this->table}.description,
        {$this->table}.video_url";

        $query = $this->db->table($this->table)
            ->select("{$columns},{$geom_area},{$coords}")
            ->get()->getRow();
        return $query;
    }
    // -------------------------------------Admin--------------------------------------------
    public function editApar($id)
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
        {$this->table}.facebook,
        {$this->table}.tiktok,
        {$this->table}.instagram,
        {$this->table}.youtube,
        {$this->table}.description,
        {$this->table}.video_url";
        $query = $this->db->table($this->table)
            ->select("{$columns},{$geom_area},{$coords}")
            ->where($this->primaryKey, $id)
            ->get()->getRow();
        return $query;
    }
    public function updateApar($id, $data, $lng, $lat, $geojson = null)
    {
        $query = $this->db->table($this->table)
            ->where('apar.id', $id)
            ->update($data);
        $update = $this->db->table($this->table)
            ->set('geom_area', "ST_GeomFromGeoJSON('{$geojson}')", false)
            ->set('geom', "ST_PointFromText('POINT($lng $lat)')", false)
            ->where('apar.id', $id)
            ->update();
        return $query && $update;
    }
    // ----------------------------------------------Gallery APi ----------------------------------
    public function get_new_id_api()
    {
        $lastId = $this->db->table($this->table_gallery)->select('id')->orderBy('id', 'ASC')->get()->getLastRow('array');
        $count = intval($lastId['id']);
        $id =  $count + 1;
        return $id;
    }
    public function getGallery($id)
    {
        $query = $this->db->table($this->table_gallery)->select('url')->where('apar_id', $id)->get();
        return $query;
    }
    public function addGallery($id = null, $data = null)
    {
        $query = false;
        foreach ($data as $gallery) {
            $new_id = $this->get_new_id_api();
            $content = [
                'id' => $new_id,
                'apar_id' => $id,
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
        return $this->db->table($this->table_gallery)->delete(['apar_id' => $id]);
    }
}
