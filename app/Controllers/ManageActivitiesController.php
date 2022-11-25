<?php

namespace App\Controllers;

use CodeIgniter\Files\File;


class ManageActivitiesController extends BaseController
{
    protected $model, $modelApar, $validation, $helpers = ['auth', 'url', 'filesystem'];
    protected $title = 'Manage-Activities | Tourism Village';
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->model = new \App\Models\activitiesModel();
        $this->modelApar = new \App\Models\aparModel();
    }
    public function index()
    {
        $objectData = $this->model->getActivities()->getResult();
        $data = [
            'title' => $this->title,
            'objectData' => $objectData
        ];

        return view('admin/manage_activities', $data);
    }

    public function save_insert()
    {
        // ---------------------Data request------------------------------------
        $request = $this->request->getPost();
        $id = $this->model->get_new_id();
        $insertRequest = [
            'id' => $id,
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description')
        ];

        $insert =  $this->model->addActivities($insertRequest);
        // ----------------Gallery-----------------------------------------
        if ($insert) {
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
                    $fileImg->move(FCPATH . 'media/photos/activities');
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
            session()->setFlashdata('success', 'Success! New activity added.');
            return redirect()->to(site_url('manage_activities'));
        } else {
            session()->setFlashdata('failed', 'Failed! Failed to add new activity.');
            return redirect()->to(site_url('manage_activities'));
        }
    }

    public function delete($id)
    {
        $delete =  $this->model->deleteActivities($id);
        if ($delete) {
            session()->setFlashdata('success', 'Success! Activity Deleted.');
            return redirect()->to(site_url('manage_activities'));
        } else {
            session()->setFlashdata('failed', 'Failed to delete activity ');
            return redirect()->to(site_url('manage_activities'));
        }
    }
}
