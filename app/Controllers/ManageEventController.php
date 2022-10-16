<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class ManageEventController extends BaseController
{
    protected $model, $modelApar, $validation, $helpers = ['auth', 'url', 'filesystem'];
    protected $title = 'Manage-Event | Tourism Village';
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->model = new \App\Models\eventModel();
        $this->modelApar = new \App\Models\aparModel();
    }

    public function index()
    {
        $objectData = $this->model->getEvents();
        $data = [
            'title' => $this->title,
            'objectData' => $objectData
        ];

        return view('admin/manage_event', $data);
    }

    public function detail($id = null)
    {
        $objectData = $this->model->getEvent($id)->getRow();
        $galleryData = $this->model->getGallery($id)->getResult();
        $aparData = $this->modelApar->getApar();
        $data = [
            'title' => $this->title,
            'config' => config('Auth'),
            'aparData' => $aparData,
            'url' => 'event',
            'objectData' => $objectData,
            'galleryData' => $galleryData
        ];
        return view('admin-detail/detail_event', $data);
    }

    public function edit($id = null)
    {
        $objectData = $this->model->getEvent($id)->getRow();
        $galleryData = $this->model->getGallery($id)->getResult();
        $aparData = $this->modelApar->getApar();
        $data = [
            'title' => $this->title,
            'config' => config('Auth'),
            'aparData' => $aparData,
            'galleryData' => $galleryData,
            'url' => 'event',
            'objectData' => $objectData
        ];
        return view('admin-edit/edit_event', $data);
    }
    public function save_update($id = null)
    {
        //--------------------validation data
        $validateRules = $this->validate([
            'name' => 'required|max_length[50]',
            'price' => 'max_length[50]',
            'contact_person' => 'max_length[14]',
            'description' => 'max_length[255]'
        ]);
        // ---------------------Data request------------------------------
        $request = $this->request->getPost();
        $updateRequest = [
            'name' => $this->request->getPost('name'),
            'date_start' => $this->request->getPost('date_start'),
            'date_end' => $this->request->getPost('date_end'),
            'time_start' => $this->request->getPost('time_start'),
            'time_end' => $this->request->getPost('time_end'),
            'price' => $this->request->getPost('price'),
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
            // -----------------------------------Video------------------------------
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
            $update = $this->model->updateEvent($id, $updateRequest, floatval($lng), floatval($lat), $geojson);
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
                session()->setFlashdata('success', 'Success! Event updated.');
                return redirect()->to(site_url('manage_event/edit/' . $id));
            } else {
                session()->setFlashdata('failed', 'Failed! Failed to update event.');
                return redirect()->to(site_url('manage_event/edit/' . $id));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed' . json_encode($listErrors));
            return redirect()->to(site_url('manage_event/edit/' . $id));
        }
    }

    public function insert()
    {
        $aparData = $this->modelApar->getApar();
        $data = [
            'title' => $this->title,
            'url' => 'event',
            'aparData' => $aparData
        ];
        return view('admin-insert/insert_event', $data);
    }
    public function save_insert()
    {
        //validation data
        $validateRules = $this->validate([
            'name' => 'required|max_length[50]',
            'date_start' => 'required',
            'date_end' => 'required',
            'price' => 'max_length[50]',
            'contact_person' => 'max_length[14]',
            'description' => 'max_length[255]'
        ]);
        // ---------------------Data request------------------------------------
        $request = $this->request->getPost();
        $id = $this->model->get_new_id();
        $insertRequest = [
            'id' => $id,
            'name' => $this->request->getPost('name'),
            'date_start' => $this->request->getPost('date_start'),
            'date_end' => $this->request->getPost('date_end'),
            'time_start' => $this->request->getPost('time_start'),
            'time_end' => $this->request->getPost('time_end'),
            'price' => $this->request->getPost('price'),
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
            // ------------------Video----------------------
            if ($request['video']) {
                $folder = $request['video'];
                $filepath = WRITEPATH . 'uploads/' . $folder;
                $filenames = get_filenames($filepath);
                $vidFile = new File($filepath . '/' . $filenames[0]);
                $vidFile->move(FCPATH . 'media/videos');
                delete_files($filepath);
                rmdir($filepath);
                $insertRequest['video_url'] = $vidFile->getFilename();
            } else {
                $insertRequest['video_url'] = null;
            }

            $insert =  $this->model->addEvent($id, $insertRequest, floatval($lng), floatval($lat), $geojson);
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
                return redirect()->to(site_url('manage_event'));
            } else {
                session()->setFlashdata('failed', 'Failed! Failed to add data.');
                return redirect()->to(site_url('manage_event/insert'));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed to add data.');
            return redirect()->to(site_url('manage_event/insert'));
        }
    }
    public function delete($id)
    {
        $delete =  $this->model->deleteEvent($id);
        if ($delete) {
            session()->setFlashdata('success', 'Success! Event Deleted.');
            return redirect()->to(site_url('manage_event'));
        } else {
            session()->setFlashdata('failed', 'Failed to delete event.');
            return redirect()->to(site_url('manage_event'));
        }
    }
}
