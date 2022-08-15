<?php


namespace App\Models;

use CodeIgniter\Model;

class ratingModel extends Model
{
    protected $table = 'rating';
    protected $primaryKey = 'id';
    protected $atraction_id = 'atraction_id';
    protected $user_id = 'user_id';

    public function getRatingId($user_id, $object, $object_id)
    {
        $query = $this->db->table($this->table)
            ->select('rating.id as rating')
            ->where('user_id', $user_id)
            ->where($object, $object_id)
            ->get();
        return $query;
    }
    public function getRating($id, $object)
    {
        $query = $this->db->table($this->table)
            ->select('sum(rating) as rating')
            ->where($object, $id)
            ->get();
        return $query;
    }

    public function getUserTotal($id, $object)
    {
        $query = $this->db->table($this->table)
            ->select('COUNT(user_id) as userTotal')
            ->where($object, $id)
            ->where('rating!=', 'null')
            ->get();
        return $query;
    }

    public function getUserRating($user_id, $object, $object_id)
    {
        $query = $this->db->table($this->table)
            ->select('rating,updated_date')
            ->where('user_id', $user_id)
            ->where($object, $object_id)
            ->get();
        return $query;
    }


    public function check($user_id, $object, $object_id)
    {
        $query = $this->db->table($this->table)
            ->select('rating.id')
            ->where('user_id', $user_id)
            ->where($object, $object_id)
            ->get();
        return $query;
    }

    public function updateAtractionRating($data, $user_id, $object, $object_id)
    {
        $query = $this->db->table($this->table)
            ->update($data, [$this->user_id => $user_id, $object => $object_id]);
        return $query;
    }

    public function addRating($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}
