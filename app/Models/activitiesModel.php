<?php


namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class activitiesModel extends Model
{
    protected $table = 'detail_package';
    protected $table_gallery = 'activities_gallery';
    protected $columns = '
    activities.id,
    activities.name,
    activities.description';

    public function get_new_id()
    {
        $lastId = $this->db->table($this->table)->select('id')->orderBy('id', 'ASC')->get()->getLastRow('array');
        $count = (int)substr($lastId['id'], 2);
        $id = sprintf('P%03d', $count + 1);
        return $id;
    }

    public function getActivities($id)
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns}")
            ->join('activities', 'activities.id = detail_package.activities_id')
            ->join('package', 'package.id = detail_package.package_id')
            ->where('detail_package.package_id', $id)
            ->get();
        return $query;
    }



    // --------------------------------------Admin-------------------------------------------
    public function addPackage($id, $data, $lng, $lat, $geojson = null)
    {
        $query = $this->db->table($this->table)->insert($data);
        if ($query) {
            $spasial = $this->db->table($this->table)
                ->set('geom_area', "ST_GeomFromGeoJSON('{$geojson}')", false)
                ->set('geom', "ST_PointFromText('POINT($lng $lat)')", false)
                ->where('package.id', $id)
                ->update();
        }
        return $query && $spasial;
    }
    public function updatePackage($id, $data, $lng, $lat, $geojson = null)
    {
        $query = $this->db->table($this->table)
            ->where('package.id', $id)
            ->update($data);
        $update = $this->db->table($this->table)
            ->set('geom_area', "ST_GeomFromGeoJSON('{$geojson}')", false)
            ->set('geom', "ST_PointFromText('POINT($lng $lat)')", false)
            ->where('package.id', $id)
            ->update();
        return $query && $update;
    }

    public function deletePackage($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
    // ----------------------------------------------Gallery APi ----------------------------------
    public function get_new_id_api()
    {
        $lastId = $this->db->table($this->table_gallery)->select('id')->orderBy('id', 'ASC')->get()->getLastRow('array');
        $count = (int)substr($lastId['id'], 3);
        $id = sprintf('IMG%04d', $count + 1);
        return $id;
    }
    public function getGallery($id)
    {
        $query = $this->db->table($this->table_gallery)->select('url')->where('activities_id', $id)->get();
        return $query;
    }
    public function addGallery($id = null, $data = null)
    {
        $query = false;
        foreach ($data as $gallery) {
            $new_id = $this->get_new_id_api();
            $content = [
                'id' => $new_id,
                'package_id' => $id,
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
        return $this->db->table($this->table_gallery)->delete(['package_id' => $id]);
    }
    // -------------------------------------------------Video Api-------------------------------------------
    public function deleteVideo($id = null)
    {
        return $this->db->table($this->table_video)->delete(['package_id' => $id]);
    }
}
