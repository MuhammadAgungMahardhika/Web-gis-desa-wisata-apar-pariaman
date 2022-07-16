<?php

namespace App\Controllers;

use App\Models\eventModel;

class ManageCulinaryPlaceController extends BaseController
{
    protected $model, $validation;
    protected $title = 'Manage-Culinary-Place | Tourism Village';
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->model = new \App\Models\culinaryPlaceModel();
    }

    public function index()
    {
        $culinaryPlaceData = $this->model->getCulinaryPlaces();

        $data = [
            'title' => $this->title,
            'culinaryPlaceData' => $culinaryPlaceData
        ];

        return view('admin/manage_culinary_place', $data);
    }
    public function detail($id = null)
    {
        $culinaryPlaceData = $this->model->getCulinaryPlace($id)->getRow();

        if (is_object($culinaryPlaceData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'culinaryPlaceData' => $culinaryPlaceData,
                'validation' => $this->validation
            ];
            return view('admin-detail/detail_culinary_place', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit($id = null)
    {

        $culinaryPlaceData = $this->model->getculinaryPlace($id)->getRow();
        if (is_object($culinaryPlaceData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'culinaryPlaceData' => $culinaryPlaceData,
                'validation' =>  $this->validation
            ];
            return view('admin-edit/edit_culinary_place', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function save_update($id = null)
    {
        //validation data
        $validateRules = $this->validate([
            'name' => 'required|max_length[100]',
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
                session()->setFlashdata('success', 'Success! culinary Place updated.');
                return redirect()->to(site_url('manage_culinary_place/edit/' . $id));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed to updateculinary Place.');
            return redirect()->to(site_url('manage_culinary_place/edit/' . $id));
        }
    }
    public function insert()
    {
        $data = [
            'title' => $this->title,
        ];

        return view('admin-insert/insert_culinary_place', $data);
    }
    public function save_insert()
    {
        //validation data
        $validateRules = $this->validate([
            'id' => 'is_unique[culinary_place.id]|required|max_length[10]',
            'name' => 'required|max_length[100]',
            'description' => 'max_length[255]',
            'lat' => 'required|max_length[20]',
            'lng' => 'required|max_length[20]'
        ]);

        if ($validateRules) {
            try {
                $insertRequest = $this->request->getPOST();
                $this->model->addCulinaryPlace($insertRequest);
            } catch (\Exception $e) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound($e);
            } finally {
                session()->setFlashdata('success', 'Success! Data Added.');
                return redirect()->to(site_url('manage_culinary_place'));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed to add data.');
            return redirect()->to(site_url('manage_culinary_place/insert'));
        }
    }

    public function delete($id)
    {
        try {
            $this->model->deleteCulinaryPlace($id);
        } catch (\Exception $e) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound($e);
        } finally {

            session()->setFlashdata('success', 'Success! Culinary Place Deleted.');
            return redirect()->to(site_url('manage_culinary_place'));
        }
    }
}
