<?php

namespace App\Controllers;

class ManageAparController extends BaseController
{
    protected $model, $validation;
    protected $title = 'Manage-Apar | Tourism Village';
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->model = new \App\Models\aparModel();
    }

    public function index()
    {
        $aparData = $this->model->getApar();

        $data = [
            'title' => $this->title,
            'aparData' => $aparData
        ];


        return view('admin/manage_apar', $data);
    }
    public function edit($id = null)
    {
        $aparData = $this->model->editApar($id);
        if (is_object($aparData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'aparData' => $aparData,
                'validation' =>  $this->validation
            ];
            return view('admin-edit/edit_apar', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function save_update($id = null)
    {
        //validation data
        $validateRules = $this->validate([
            'name' => 'required|max_length[100]',
            'type_of_tourism' => 'required|max_length[100]',
            'address' => 'required|max_length[100]',
            'contact_person' => 'max_length[14]',
            'lat' => 'required|max_length[20]',
            'lng' => 'required|max_length[20]'
        ]);

        if ($validateRules) {
            try {
                $updateRequest = $this->request->getPost();
                $this->model->update($id, $updateRequest);
            } catch (\Exception $e) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound($e);
            } finally {
                session()->setFlashdata('success', 'Success! Data updated.');
                return redirect()->to(site_url('manage_apar/edit/' . $id));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed to update.');
            return redirect()->to(site_url('manage_apar/edit/' . $id));
        }
        //ambil data

    }
    public function insert()
    {
        $data = [
            'title' => $this->title,
        ];

        return view('admin-insert/insert_apar', $data);
    }
}
