<?php


namespace App\Models;

use CodeIgniter\Model;

class reviewModel extends Model
{
    protected $table = 'review_atraction';
    protected $primaryKey = 'id';
    protected $atraction_id = 'atraction_id';
    public function getRating($id)
    {
        $query = $this->db->table($this->table)
            ->select('sum(rating) as rating')
            ->where($this->atraction_id, $id)
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

    public function updateRating($user_id, $atraction_id, $ratingValue)
    {
        $query = $this->db->table($this->table)
            ->update(['rating', $ratingValue]);
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
