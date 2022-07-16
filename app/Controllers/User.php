<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use PhpParser\Node\Stmt\Echo_;

class User extends BaseController
{

    protected  $model, $validation;
    // Constructor
    public function __construct()
    {
        $this->model = new \App\Models\usersModel();
        $this->validation =  \Config\Services::validation();
    }
    // Masuk halaman home atau utama
    public function index()
    {
        $data = [
            'title' => 'User | Tourism Village',
            'config' => config('Auth'),
            'validation' => \Config\Services::validation()
        ];
        return view('user/index', $data);
    }
    public function save_update($id = null)
    {
        $validateInput = $this->validate([
            'email' => 'valid_email',
            'username' => 'required|max_length[31]',
            'name' => 'max_length[50]',
            'contact' => 'max_length[14]',
            'address' => 'max_length[255]'
        ]);

        if ($validateInput) {
            $updateRequest = $this->request->getPost();

            $this->model->update($id, $updateRequest);
            session()->setFlashdata('success', 'Success! User profile updated.');
            return redirect()->to(site_url('user'));
        } else {
            session()->setFlashdata('failed', 'Failed! Failed to update user profile.');
            return redirect()->to(site_url('user'));
        }
    }
}
