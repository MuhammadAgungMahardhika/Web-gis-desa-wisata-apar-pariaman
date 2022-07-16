<?php

namespace App\Models;

use CodeIgniter\Model;

class usersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'username', 'name', 'address', 'contact', 'user_image'];

    public function getUsers()
    {
        $user_id = user()->id;
        $query = $this->db->table('users', 'users.id')
            ->select('users.id as userid, username, email, users.name as fullname,address,contact,auth_groups.name as role')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
            ->where('users.id !=', $user_id)
            ->get()->getResult();

        return $query;
    }

    public function getUser($id)
    {

        $query =  $this->db->table($this->table)
            ->select('users.id as userid, username, users.name as fullname, email, address, contact, auth_groups.name as role,user_image ')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
            ->where('users.id', $id)
            ->get()->getRow();

        return $query;
    }
    public function deleteUser($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
}
