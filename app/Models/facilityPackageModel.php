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
        $count = intval($lastId['id']);
        $id =  $count + 1;
        return $id;
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
}
