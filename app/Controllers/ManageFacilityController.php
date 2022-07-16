<?php

namespace App\Controllers;

use App\Models\eventModel;

class ManageFacilityController extends BaseController
{
    protected $model, $validation;
    protected $title = 'Manage-Facility | Tourism Village';
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->model = new \App\Models\facilityModel();
    }

    public function index()
    {
        $facilityData = $this->model->getFacilities();

        $data = [
            'title' => $this->title,
            'facilityData' => $facilityData
        ];

        return view('admin/manage_facility', $data);
    }
    public function detail($id = null)
    {
        $facilityData = $this->model->getfacility($id)->getRow();

        if (is_object($facilityData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'facilityData' => $facilityData,
                'validation' => $this->validation
            ];
            return view('admin-detail/detail_facility', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit($id = null)
    {

        $facilityData = $this->model->getfacility($id)->getRow();
        if (is_object($facilityData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'facilityData' => $facilityData,
                'validation' =>  $this->validation
            ];
            return view('admin-edit/edit_facility', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function save_update($id = null)
    {
        //validation data
        $validateRules = $this->validate([
            'name' => 'required|max_length[50]',
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
                session()->setFlashdata('success', 'Success! Facility updated.');
                return redirect()->to(site_url('manage_facility/edit/' . $id));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed to update facility.');
            return redirect()->to(site_url('manage_facility/edit/' . $id));
        }
    }
    public function insert()
    {
        $data = [
            'title' => $this->title,
        ];

        return view('admin-insert/insert_facility', $data);
    }
    public function save_insert()
    {
        //validation data
        $validateRules = $this->validate([
            'id' => 'is_unique[facility.id]|required|max_length[10]',
            'name' => 'required|max_length[50]',
            'description' => 'max_length[255]',
            'lat' => 'required|max_length[20]',
            'lng' => 'required|max_length[20]'
        ]);

        if ($validateRules) {
            try {
                $insertRequest = $this->request->getPOST();
                $this->model->addFacility($insertRequest);
            } catch (\Exception $e) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound($e);
            } finally {

                session()->setFlashdata('success', 'Success! Data Added.');
                return redirect()->to(site_url('manage_facility'));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed to add data.');
            return redirect()->to(site_url('manage_facility/insert'));
        }
    }

    public function delete($id)
    {
        try {
            $this->model->deleteFacility($id);
        } catch (\Exception $e) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound($e);
        } finally {
            session()->setFlashdata('success', 'Success! Facility Deleted.');
            return redirect()->to(site_url('manage_facility'));
        }
    }
}
