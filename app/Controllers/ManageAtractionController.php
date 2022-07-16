<?php

namespace App\Controllers;

class ManageAtractionController extends BaseController
{
    protected $model, $validation;
    protected $title = 'Manage-Atractions | Tourism Village';
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->model = new \App\Models\atractionModel();
    }

    public function index()
    {
        $atractionData = $this->model->getAtractions();

        $data = [
            'title' => $this->title,
            'atractionData' => $atractionData
        ];

        return view('admin/manage_atraction', $data);
    }
    public function detail($id = null)
    {
        $atractionData = $this->model->getAtraction($id)->getRow();

        if (is_object($atractionData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'atractionData' => $atractionData,
                'validation' => $this->validation
            ];
            return view('admin-detail/detail_atraction', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit($id = null)
    {
        $atractionData = $this->model->getAtraction($id)->getRow();
        if (is_object($atractionData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'atractionData' => $atractionData,
                'validation' =>  $this->validation
            ];
            return view('admin-edit/edit_atraction', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function save_update($id = null)
    {
        //validation data
        $validateRules = $this->validate([
            'name' => 'required|max_length[100]',
            'status' => 'required|max_length[31]',
            'price' => 'max_length[50]',
            'contact_person' => 'max_length[14]',
            'description' => 'max_length[255]',
            'lat' => 'required|max_length[20]',
            'lng' => 'required|max_length[20]'
        ]);

        $updateRequest = $this->request->getPost();
        if ($validateRules) {
            try {
                $this->model->update($id, $updateRequest);
            } catch (\Exception $e) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound($e);
            } finally {
                session()->setFlashdata('success', 'Success! Atraction updated.');
                return redirect()->to(site_url('manage_atraction/edit/' . $id));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed to update atraction.');
            return redirect()->to(site_url('manage_atraction/edit/' . $id));
        }
    }
    public function insert()
    {
        $data = [
            'title' => $this->title,
        ];

        return view('admin-insert/insert_atraction', $data);
    }
    public function save_insert()
    {
        //validation data
        $validateRules = $this->validate([
            'id' => 'is_unique[atraction.id]|required|max_length[10]',
            'name' => 'max_length[50]',
            'status' => 'required|max_length[31]',
            'price' => 'max_length[50]',
            'contact_person' => 'max_length[14]',
            'description' => 'max_length[255]',
            'lat' => 'max_length[20]',
            'lng' => 'max_length[20]'
        ]);

        if ($validateRules) {
            try {
                $insertRequest = $this->request->getPOST();
                $this->model->addAtraction($insertRequest);
            } catch (\Exception $e) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound($e);
            } finally {
                session()->setFlashdata('success', 'Success! Data Added.');
                return redirect()->to(site_url('manage_atraction'));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed to add data.');
            return redirect()->to(site_url('manage_atraction/insert'));
        }
    }

    public function delete($id)
    {
        try {
            $this->model->deleteAtraction($id);
        } catch (\Exception $e) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound($e);
        } finally {
            session()->setFlashdata('success', 'Success! Atraction Deleted.');
            return redirect()->to(site_url('manage_atraction'));
        }
    }
}
