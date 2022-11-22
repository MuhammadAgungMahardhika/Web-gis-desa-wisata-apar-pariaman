<?php

namespace App\Controllers;

use CodeIgniter\Files\File;


class ManageSouvenirPlaceController extends BaseController
{
    protected $model, $modelApar, $validation, $helpers = ['auth', 'url', 'filesystem'];
    protected $title = 'Manage-Souvenir-Place | Tourism Village';
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->model = new \App\Models\souvenirPlaceModel();
        $this->modelApar = new \App\Models\aparModel();
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
        $objectData = $this->model->getSouvenirPlace($id)->getRow();
        $galleryData = $this->model->getGallery($id)->getResult();
        $aparData = $this->modelApar->getApar();
        $data = [
            'title' => 'Manage-Souvenir-PLace | Tourism Villag',
            'config' => config('Auth'),
            'url' => 'souvenir_place',
            'objectData' => $objectData,
            'galleryData' => $galleryData,
            'aparData' => $aparData
        ];
        return view('admin-detail/detail_souvenir_place', $data);
    }

    public function edit($id = null)
    {
        $objectData = $this->model->getSouvenirPlace($id)->getRow();
        $galleryData = $this->model->getGallery($id)->getResult();
        $aparData = $this->modelApar->getApar();
        $data = [
            'title' => $this->title,
            'config' => config('Auth'),
            'aparData' => $aparData,
            'galleryData' => $galleryData,
            'url' => 'souvenir_place',
            'objectData' => $objectData
        ];
        return view('admin-edit/edit_souvenir_place', $data);
    }

    public function save_update($id = null)
    {
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

        // ----------------------------------UPDATE DATA--------------------------
        $update = $this->model->updateSp($id, $updateRequest, floatval($lng), floatval($lat), $geojson);
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
            session()->setFlashdata('success', 'Success! Souvenir Place updated.');
            return redirect()->to(site_url('manage_souvenir_place/edit/' . $id));
        } else {
            session()->setFlashdata('failed', 'Failed! Failed to update Souvenir Place.');
            return redirect()->to(site_url('manage_souvenir_place/edit/' . $id));
        }
    }
    public function insert()
    {
        $aparData = $this->modelApar->getApar();
        $data = [
            'title' => $this->title,
            'url' => 'souvenir_place',
            'aparData' => $aparData
        ];
        return view('admin-insert/insert_souvenir_place', $data);
    }
    public function save_insert()
    {

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

        $insert =  $this->model->addSouvenirPlace($id, $insertRequest, floatval($lng), floatval($lat), $geojson);
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
            return redirect()->to(site_url('manage_souvenir_place'));
        } else {
            session()->setFlashdata('failed', 'Failed! Failed to update Souvenir Place');
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
