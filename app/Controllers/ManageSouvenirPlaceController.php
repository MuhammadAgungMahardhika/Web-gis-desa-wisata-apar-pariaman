<?php

namespace App\Controllers;

use App\Models\eventModel;

class ManageSouvenirPlaceController extends BaseController
{
    protected $model, $validation;
    protected $title = 'Manage-Souvenir-Place | Tourism Village';
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->model = new \App\Models\souvenirPlaceModel();
    }

    public function index()
    {
        $souvenirPlaceData = $this->model->getSouvenirPlaces();

        $data = [
            'title' => $this->title,
            'souvenirPlaceData' => $souvenirPlaceData
        ];

        return view('admin/manage_souvenir_place', $data);
    }
    public function detail($id = null)
    {
        $souvenirPlaceData = $this->model->getSouvenirPlace($id)->getRow();

        if (is_object($souvenirPlaceData)) {
            $data = [
                'title' => 'Manage-Souvenir-PLace | Tourism Villag',
                'config' => config('Auth'),
                'souvenirPlaceData' => $souvenirPlaceData,
                'validation' => $this->validation
            ];
            return view('admin-detail/detail_souvenir_place', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit($id = null)
    {

        $souvenirPlaceData = $this->model->getSouvenirPlace($id)->getRow();
        if (is_object($souvenirPlaceData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'souvenirPlaceData' => $souvenirPlaceData,
                'validation' =>  $this->validation
            ];
            return view('admin-edit/edit_souvenir_place', $data);
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
                session()->setFlashdata('success', 'Success! Souvenir Place updated.');
                return redirect()->to(site_url('manage_souvenir_place/edit/' . $id));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed to updateSouvenir Place.');
            return redirect()->to(site_url('manage_souvenir_place/edit/' . $id));
        }
    }
    public function insert()
    {
        $data = [
            'title' => $this->title,
        ];

        return view('admin-insert/insert_souvenir_place', $data);
    }
    public function save_insert()
    {
        //validation data
        $validateRules = $this->validate([
            'id' => 'is_unique[souvenir_place.id]|required|max_length[10]',
            'name' => 'required|max_length[50]',
            'description' => 'max_length[255]',
            'lat' => 'required|max_length[20]',
            'lng' => 'required|max_length[20]'
        ]);

        if ($validateRules) {
            try {
                $insertRequest = $this->request->getPOST();
                $this->model->addSouvenirPlace($insertRequest);
            } catch (\Exception $e) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound($e);
            } finally {
                session()->setFlashdata('success', 'Success! Data Added.');
                return redirect()->to(site_url('manage_souvenir_place'));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed to add data.');
            return redirect()->to(site_url('manage_souvenir_place/insert'));
        }
    }

    public function delete($id)
    {
        try {
            $this->model->deleteSouvenirPlace($id);
        } catch (\Exception $e) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound($e);
        } finally {
            session()->setFlashdata('success', 'Success! Souvenir Place Deleted.');
            return redirect()->to(site_url('manage_souvenir_place'));
        }
    }
}
