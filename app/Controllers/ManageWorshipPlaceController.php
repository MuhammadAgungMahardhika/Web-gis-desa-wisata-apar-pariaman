<?php

namespace App\Controllers;

use App\Models\eventModel;

class ManageWorshipPlaceController extends BaseController
{
    protected $model, $validation;
    protected $title = 'Manage-Worship-Place| Tourism Village';
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->model = new \App\Models\worshipPlaceModel();
    }

    public function index()
    {
        $worshipPlaceData = $this->model->getWorshipPlaces();

        $data = [
            'title' => $this->title,
            'worshipPlaceData' => $worshipPlaceData
        ];

        return view('admin/manage_worship_place', $data);
    }
    public function detail($id = null)
    {
        $worshipPlaceData = $this->model->getWorshipPlace($id)->getRow();

        if (is_object($worshipPlaceData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'worshipPlaceData' => $worshipPlaceData,
                'validation' => $this->validation
            ];
            return view('admin-detail/detail_worship_place', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit($id = null)
    {

        $worshipPlaceData = $this->model->getWorshipPlace($id)->getRow();
        if (is_object($worshipPlaceData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'worshipPlaceData' => $worshipPlaceData,
                'validation' =>  $this->validation
            ];
            return view('admin-edit/edit_worship_place', $data);
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
                session()->setFlashdata('success', 'Success! worship Place updated.');
                return redirect()->to(site_url('manage_worship_place/edit/' . $id));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed to updateworship Place.');
            return redirect()->to(site_url('manage_worship_place/edit/' . $id));
        }
    }
    public function insert()
    {
        $data = [
            'title' => $this->title,
        ];

        return view('admin-insert/insert_worship_place', $data);
    }
    public function save_insert()
    {
        //validation data
        $validateRules = $this->validate([
            'id' => 'is_unique[worship_place.id]|required|max_length[10]',
            'name' => 'required|max_length[50]',
            'description' => 'max_length[255]',
            'lat' => 'required|max_length[20]',
            'lng' => 'required|max_length[20]'
        ]);

        if ($validateRules) {
            try {
                $insertRequest = $this->request->getPOST();
                $this->model->addWorshipPlace($insertRequest);
            } catch (\Exception $e) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound($e);
            } finally {

                session()->setFlashdata('success', 'Success! Data Added.');
                return redirect()->to(site_url('manage_worship_place'));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed to add data.');
            return redirect()->to(site_url('manage_worship_place/insert'));
        }
    }

    public function delete($id)
    {
        try {
            $this->model->deleteWorshipPlace($id);
        } catch (\Exception $e) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound($e);
        } finally {
            session()->setFlashdata('success', 'Success! Worship Deleted.');
            return redirect()->to(site_url('manage_worship_place'));
        }
    }
}
