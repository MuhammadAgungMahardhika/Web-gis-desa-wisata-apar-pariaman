<?php


namespace App\Models;

use CodeIgniter\Model;

class facilityPackageModel extends Model
{
    protected $table = 'facility_package';

    protected $columns = '
    facility_package.id,
    facility_package.name';

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

    public function getFacilityPackage($id)
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns}")
            ->join('package', 'package.id = facility_package.package_id')
            ->where('package.id', $id)
            ->get();
        return $query;
    }


    // --------------------------------------Admin-------------------------------------------
    public function addFacilityPackage($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function deleteFacilityPackage($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
}
