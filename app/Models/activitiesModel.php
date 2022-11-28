<?php


namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class activitiesModel extends Model
{
    protected $table_detail = 'detail_package';
    protected $table = 'activities';
    protected $table_gallery = 'activities_gallery';
    protected $columns = '
    activities.id,
    activities.name,
    activities.description';

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

    public function getActivities()
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns}")
            ->get();
        return $query;
    }

    public function getPackageActivity($id)
    {
        $query = $this->db->table($this->table_detail)
            ->select("{$this->columns}")
            ->join('activities', 'activities.id = detail_package.activities_id')
            ->join('package', 'package.id = detail_package.package_id')
            ->where('detail_package.package_id', $id)
            ->get();
        return $query;
    }
    public function getActivity($id)
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns}")
            ->where('activities.id', $id)
            ->get();
        return $query;
    }



    // --------------------------------------Admin-------------------------------------------

    public function addActivities($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updateActivities($id, $data)
    {
        $query = $this->db->table($this->table)
            ->where('activities.id', $id)
            ->update($data);
        return $query;
    }

    public function addPackageActivities($data)
    {
        $query = $this->db->table($this->table_detail)->insert($data);
        return $query;
    }
    public function updatePackageActivities($id, $activity_id)
    {
        $query = $this->db->table($this->table_detail)
            ->insert(['package_id' => $id, 'activities_id' => $activity_id]);
        return $query;
    }

    public function deleteDetailPackage($id)
    {
        $query = $this->db->table($this->table_detail)->delete(array('package_id' => $id));
        return $query;
    }
    public function deleteActivities($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
    // ----------------------------------------------Gallery APi ----------------------------------
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
                'activities_id' => $id,
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
        return $this->db->table($this->table_gallery)->delete(['activities_id' => $id]);
    }
}
