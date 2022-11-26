<?php

namespace App\Models;

use CodeIgniter\Model;

class usersModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['email', 'username', 'name', 'address', 'contact', 'user_image'];
    protected $columns = 'users.id as userid, username, email, users.name as fullname,address,contact,auth_groups.name as role,user_image';

    public function getUsers()
    {
        $user_id = user()->id;
        $query = $this->db->table('users', 'users.id')
            ->select("{$this->columns}")
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
            ->where('users.id !=', $user_id)
            ->get()->getResult();

        return $query;
    }

    public function getUser($id)
    {
        $query =  $this->db->table($this->table)
            ->select("{$this->columns}")
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
            ->where('users.id', $id)
            ->get()->getRow();

        return $query;
    }

    public function updatePassword($id, $new_password)
    {
        $update = $this->db->table($this->table)
            ->set('password_hash', $new_password)
            ->where('users.id', $id)
            ->update();
        return $update;
    }
    public function deleteUser($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }

    // Check Login-----------------------
    public function checkLogin($login, $password)
    {
        $query =  $this->db->table($this->table)
            ->select("{$this->columns}")
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
            ->where('users.username ', $login)
            ->where('users.password_hash', $password)
            ->get()->getRow();

        return $query;
    }
    public function getTotal()
    {
        $query =  $this->db->table($this->table)
            ->selectCount("id")->get()
            ->getRow();
        return $query;
    }
}
