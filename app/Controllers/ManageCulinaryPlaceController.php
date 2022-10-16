<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class ManageCulinaryPlaceController extends BaseController
{
    protected $model, $modelApar, $validation, $helpers = ['auth', 'url', 'filesystem'];
    protected $title = 'Manage-Culinary-Place | Tourism Village';
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->model = new \App\Models\culinaryPlaceModel();
        $this->modelApar = new \App\Models\aparModel();
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
        $objectData = $this->model->getCulinaryPlace($id)->getRow();
        $galleryData = $this->model->getGallery($id)->getResult();
        $aparData = $this->modelApar->getApar();
        $data = [
            'title' => $this->title,
            'config' => config('Auth'),
            'url' => 'culinary_place',
            'objectData' => $objectData,
            'galleryData' => $galleryData,
            'aparData' => $aparData
        ];
        return view('admin-detail/detail_culinary_place', $data);
    }

    public function edit($id = null)
    {

        $objectData = $this->model->getculinaryPlace($id)->getRow();
        $galleryData = $this->model->getGallery($id)->getResult();
        $aparData = $this->modelApar->getApar();
        $data = [
            'title' => $this->title,
            'config' => config('Auth'),
            'objectData' => $objectData,
            'galleryData' => $galleryData,
            'url' => 'culinary_place',
            'aparData' => $aparData

        ];
        return view('admin-edit/edit_culinary_place', $data);
    }

    public function save_update($id = null)
    {
        //validation data
        $validateRules = $this->validate([
            'name' => 'required|max_length[100]',
            'description' => 'max_length[255]',
        ]);
        // ---------------------Data request------------------------------
        $request = $this->request->getPost();
        $updateRequest = [
            'name' => $this->request->getPost('name'),
            'owner' => $this->request->getPost('owner'),
            'open' => $this->request->getPost('open'),
            'close' => $this->request->getPost('close'),
            'contact_person' => $this->request->getPost('contact_person'),
            'description' => $this->request->getPost('description')
        ];
        $geojson = $this->request->getPost('geojson');
        if (!$geojson) {
            $geojson = 'null';
        }
        $lat = $this->request->getPost('latitude');
        $lng = $this->request->getPost('longitude');

        if ($validateRules) {

            // ----------------------------------UPDATE DATA--------------------------
            $update = $this->model->updateCp($id, $updateRequest, floatval($lng), floatval($lat), $geojson);
            if ($update) {
                // --------------------------------Gallery------------------------------
                // check if gallery have empty string then make it become empty array
                foreach ($request['gallery'] as $key => $value) {
                    if (!strlen($value)) {
                        unset($request['gallery'][$key]);
                    }
                }
                if ($request['gallery']) {
                    $folders = $request['gallery'];
                    $gallery = array();
                    foreach ($folders as $folder) {
                        $filepath = WRITEPATH . 'uploads/' . $folder;
                        $filenames = get_filenames($filepath);
                        $fileImg = new File($filepath . '/' . $filenames[0]);
                        $fileImg->move(FCPATH . 'media/photos');
                        delete_files($filepath);
                        rmdir($filepath);
                        $gallery[] = $fileImg->getFilename();
                    }
                    $updateGallery = $this->model->updateGallery($id, $gallery);
                } else {
                    $updateGallery = $this->model->deleteGallery($id);
                }
            }
            if ($update && $updateGallery) {
                session()->setFlashdata('success', 'Success! culinary Place updated.');
                return redirect()->to(site_url('manage_culinary_place/edit/' . $id));
            } else {
                session()->setFlashdata('failed', 'Failed! Failed to updateculinary Place.');
                return redirect()->to(site_url('manage_culinary_place/edit/' . $id));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed' . json_encode($listErrors));
            return redirect()->to(site_url('manage_culinary_place/edit/' . $id));
        }
    }
    public function insert()
    {
        $aparData = $this->modelApar->getApar();
        $data = [
            'title' => $this->title,
            'url' => 'culinary_place',
            'aparData' => $aparData
        ];
        return view('admin-insert/insert_culinary_place', $data);
    }
    public function save_insert()
    {
        //validation data
        $validateRules = $this->validate([
            'name' => 'required|max_length[100]',
            'description' => 'max_length[255]'
        ]);
        // ---------------------Data request------------------------------
        $request = $this->request->getPost();
        $id = $this->model->get_new_id();
        $insertRequest = [
            'id' => $id,
            'name' => $this->request->getPost('name'),
            'owner' => $this->request->getPost('owner'),
            'open' => $this->request->getPost('open'),
            'close' => $this->request->getPost('close'),
            'contact_person' => $this->request->getPost('contact_person'),
            'description' => $this->request->getPost('description')
        ];
        $geojson = $this->request->getPost('geojson');
        if (!$geojson) {
            $geojson = 'null';
        }
        $lat = $this->request->getPost('latitude');
        $lng = $this->request->getPost('longitude');

        if ($validateRules) {
            $insert =  $this->model->addCulinaryPlace($id, $insertRequest, floatval($lng), floatval($lat), $geojson);
            if ($insert) {
                // ----------------Gallery-----------------------------------------
                // check if gallery have empty string then make it become empty array
                foreach ($request['gallery'] as $key => $value) {
                    if (!strlen($value)) {
                        unset($request['gallery'][$key]);
                    }
                }
                if ($request['gallery']) {
                    $folders = $request['gallery'];
                    $gallery = array();
                    foreach ($folders as $folder) {
                        $filepath = WRITEPATH . 'uploads/' . $folder;
                        $filenames = get_filenames($filepath);
                        $fileImg = new File($filepath . '/' . $filenames[0]);
                        $fileImg->move(FCPATH . 'media/photos');
                        delete_files($filepath);
                        rmdir($filepath);
                        $gallery[] = $fileImg->getFilename();
                    }
                    $insertGallery =  $this->model->addGallery($id, $gallery);
                } else {
                    $insertGallery = true;
                }
            }
            if ($insert && $insertGallery) {
                session()->setFlashdata('success', 'Success! Data Added.');
                return redirect()->to(site_url('manage_culinary_place'));
            } else {
                session()->setFlashdata('failed', 'Failed! Failed to update Culinary Place');
                return redirect()->to(site_url('manage_culinary_place/insert'));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed.' . json_encode($listErrors));
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
