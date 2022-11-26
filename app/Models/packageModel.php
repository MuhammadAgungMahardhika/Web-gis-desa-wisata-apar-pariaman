<?php


namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class packageModel extends Model
{
    protected $table = 'package';

    protected $table_activities = 'detail_package';
    protected $columns = '
    package.id,
    package.name,
    package.min_capacity,
    package.price,
    package.contact_person,
    package.brosur_url as url,
    package.description';

    protected $columns_activities = '
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
    public function getPackages()
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns}")
            ->get()->getResult();
        return $query;
    }
    public function getPackage($id)
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns}")
            ->where('package.id', $id)
            ->get();
        return $query;
    }


    // --------------------------------------Admin-------------------------------------------
    public function addPackage($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updatePackage($id, $data)
    {
        $query = $this->db->table($this->table)
            ->where('package.id', $id)
            ->update($data);

        return $query;
    }

    public function deletePackage($id)
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
        $query = $this->db->table($this->table_gallery)->select('url')->where('package_id', $id)->get();
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
