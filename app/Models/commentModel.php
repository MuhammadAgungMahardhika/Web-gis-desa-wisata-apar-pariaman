<?php


namespace App\Models;

use CodeIgniter\Model;

class commentModel extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'id';

    public function getObjectComment($id, $object)
    {
        $query = $this->db->table($this->table)
            ->select('comment')
            ->join('rating', 'rating.id = comment.rating_id')
            ->where($object, $id)
            ->get();
        return $query;
    }
    public function getUserComment($user_id, $object, $object_id)
    {
        $query = $this->db->table($this->table)
            ->select('comment')
            ->join('rating', 'rating.id = comment.rating_id')
            ->where('rating.user_id', $user_id)
            ->where('rating.' + $object, $object_id)
            ->get();
        return $query;
    }
    public function addComment($rating_id, $comment)
    {
        $query = $this->db->table($this->table)->insert(['comment.rating_id' => $rating_id, 'comment.comment' => $comment]);
        return $query;
    }
}
