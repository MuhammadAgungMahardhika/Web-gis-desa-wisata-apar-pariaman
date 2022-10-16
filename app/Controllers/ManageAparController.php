<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class ManageAparController extends BaseController
{
    protected $model, $validation;
    protected $title = 'Manage-Apar | Tourism Village';
    protected $helpers = ['auth', 'url', 'filesystem'];
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->model = new \App\Models\aparModel();
    }

    public function index()
    {
        $objectData = $this->model->getApar();
        $galleryData = $this->model->getGallery('A01')->getResult();
        $data = [
            'title' => $this->title,
            'url' => 'apar',
            'objectData' => $objectData,
            'galleryData' => $galleryData
        ];


        return view('admin/manage_apar', $data);
    }
    public function edit($id = null)
    {
        $aparData = $this->model->editApar($id);
        $galleryData = $this->model->getGallery($id)->getResult();
        $data = [
            'title' => $this->title,
            'config' => config('Auth'),
            'url' => 'apar',
            'aparData' => $aparData,
            'galleryData' => $galleryData,
            'validation' =>  $this->validation
        ];
        return view('admin-edit/edit_apar', $data);
    }

    public function save_update($id = null)
    {
        //validation data
        $validateRules = $this->validate([
            'name' => 'required|max_length[100]',
            'type_of_tourism' => 'required|max_length[100]',
            'address' => 'required|max_length[100]',
            'contact_person' => 'max_length[14]',
        ]);

        // ---------------------Data request
        $request = $this->request->getPost();
        $updateRequest = [
            'name' => $this->request->getPost('name'),
            'type_of_tourism' => $this->request->getPost('type_of_tourism'),
            'address' => $this->request->getPost('address'),
            'open' => $this->request->getPost('open'),
            'close' => $this->request->getPost('close'),
            'status' => $this->request->getPost('status'),
            'ticket' => $this->request->getPost('ticket'),
            'contact_person' => $this->request->getPost('contact_person'),
            'description' => $this->request->getPost('description')
        ];
        $geojson = $this->request->getPost('geojson');
        if (!$geojson) {
            $geojson = 'null';
        }
        $lat = $this->request->getPost('latitude');
        $lng = $this->request->getPost('longitude');

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
            $this->model->updateGallery($id, $gallery);
        } else {
            $this->model->deleteGallery($id);
        }
        // ------------------Video----------------------
        if ($request['video']) {
            $folder = $request['video'];
            $filepath = WRITEPATH . 'uploads/' . $folder;
            $filenames = get_filenames($filepath);
            $vidFile = new File($filepath . '/' . $filenames[0]);
            $vidFile->move(FCPATH . 'media/videos');
            delete_files($filepath);
            rmdir($filepath);
            $updateRequest['video_url'] = $vidFile->getFilename();
        } else {
            $updateRequest['video_url'] = null;
        }
        // ----------------------------------UPDATE DATA--------------------------
        if ($validateRules) {
            $update =  $this->model->updateApar($id, $updateRequest, floatval($lng), floatval($lat), $geojson);
            if ($update) {
                session()->setFlashdata('success', 'Success! Village updated.');
                return redirect()->to(site_url('manage_apar/edit/' . $id));
            } else {
                session()->setFlashdata('failed', 'Failed! Failed to update apar.');
                return redirect()->to(site_url('manage_apar/edit/' . $id));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed to update village.');
            return redirect()->to(site_url('manage_apar/edit/' . $id));
        }
    }
    public function insert()
    {
        $data = [
            'title' => $this->title,
        ];

        return view('admin-insert/insert_apar', $data);
    }
}
