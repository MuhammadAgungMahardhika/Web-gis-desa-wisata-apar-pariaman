<?php

namespace App\Controllers;

class ManageUsersController extends BaseController
{
    protected $model, $validation;
    protected $title = 'Manage-Users | Tourism Village';
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->model = new \App\Models\usersModel();
    }

    // 1. Display ALl user
    public function index()
    {
        $usersData = $this->model->getUsers();
        $data = [
            'title' => $this->title,
            'config' => config('Auth'),
            'users' => $usersData
        ];
        return view('admin/manage_users', $data);
    }

    // Display user detail
    public function detail($id = 0)
    {
        $userData = $this->model->getUser($id);

        $data = [
            'title' =>  $this->title,
            'validation' => $this->validation,
            'config' => config('Auth'),
            'user' => $userData
        ];

        if (empty($userData)) {
            return redirect()->to('/manage_users');
        }
        return view('admin-detail/detail_user', $data);
    }

    //  Display user edit
    public function edit($id = 0)
    {
        $userData = $this->model->getUser($id);
        $data = [
            'title' =>  $this->title,
            'validation' => $this->validation,
            'config' => config('Auth'),
            'user' => $userData
        ];
        if (empty($userData)) {
            return redirect()->to('/manage_users');
        }
        return view('admin-edit/edit_user', $data);
    }

    //Save Update User
    public function save_update($id = null)
    {
        //validation data
        $validateRules = $this->validate([
            'email' => 'required|valid_email',
            'username' => 'required|max_length[31]',
            'name' => 'max_length[50]',
            'contact' => 'max_length[14]',
            'address' => 'max_length[255]'
        ]);
        $updateRequest = $this->request->getPost();
        if ($validateRules) {
            $update =  $this->model->update($id, $updateRequest);
            if ($update) {
                session()->setFlashdata('success', 'Success! User updated.');
                return redirect()->to(site_url('manage_users/edit/' . $id));
            } else {
                session()->setFlashdata('failed', 'Failed! Failed to update user.');
                return redirect()->to(site_url('manage_users/edit/' . $id));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed' . json_encode($listErrors));
            return redirect()->to(site_url('manage_users/edit/' . $id));
        }
    }

    //Insert new user by admin
    public function insert()
    {
        $data = [
            'title' => $this->title,
            'config' => config('Auth')
        ];
        return view('admin-insert/insert_user', $data);
    }

    //Save insert controller in vendor\myth\auth\Controllers\AuthController.php\attemptRegister2()
    public function delete($id)
    {

        $delete =  $this->model->deleteUser($id);
        if ($delete) {
            session()->setFlashdata('success', 'Success! User Deleted.');
            return redirect()->to(site_url('manage_users'));
        } else {
            session()->setFlashdata('failed', 'Failed! Failed' . json_encode($delete));
            return redirect()->to(site_url('manage_users'));
        }
    }
}
