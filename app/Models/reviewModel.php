<?php


namespace App\Models;

use CodeIgniter\Model;

class reviewModel extends Model
{
    protected $table = 'review_atraction';
    protected $primaryKey = 'id';
    protected $atraction_id = 'atraction_id';
    protected $user_id = 'user_id';
    public function getRating($id)
    {
        $query = $this->db->table($this->table)
            ->select('sum(rating) as rating')
            ->where($this->atraction_id, $id)
            ->get();
        return $query;
    }

    public function getUserTotal($id)
    {
        $query = $this->db->table($this->table)
            ->select('COUNT(user_id) as userTotal')
            ->where($this->atraction_id, $id)
            ->get();
        return $query;
    }

    public function getUserRating($user_id, $object_id)
    {
        $query = $this->db->table($this->table)
            ->select('rating,updated_date')
            ->where('user_id', $user_id)
            ->where($this->atraction_id, $object_id)
            ->get();
        return $query;
    }


    public function check($user_id, $object_id)
    {
        $query = $this->db->table($this->table)
            ->select('sum(rating) as rating')
            ->where('user_id', $user_id)
            ->where($this->atraction_id, $object_id)
            ->get();
        return $query;
    }

    public function updateAtractionRating($data, $user_id, $atraction_id)
    {
        $query = $this->db->table($this->table)
            ->update($data, [$this->user_id => $user_id, $this->atraction_id => $atraction_id]);
        return $query;
    }

    public function addRating($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function getComment($id)
    {
    }
}
