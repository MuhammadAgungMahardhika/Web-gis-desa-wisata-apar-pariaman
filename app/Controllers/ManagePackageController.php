<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class ManagePackageController extends BaseController
{
    protected $model, $modelActivities, $modelApar,  $modelFp, $validation, $helpers = ['auth', 'url', 'filesystem'];
    protected $title = 'Manage-Packages | Tourism Village';
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->model = new \App\Models\packageModel();
        $this->modelApar = new \App\Models\aparModel();
        $this->modelActivities = new \App\Models\activitiesModel();
        $this->modelFp = new \App\Models\facilityPackageModel();
    }
    public function index()
    {
        $objectData = $this->model->getPackages();
        $data = [
            'title' => $this->title,
            'objectData' => $objectData
        ];
        return view('admin/manage_package', $data);
    }
    public function detail($id = null)
    {
        $objectData = $this->model->getPackage($id)->getRow();
        $aparData = $this->modelApar->getApar();
        $facilityPackage = $this->modelFp->getFacilityPackage($id)->getResult();
        $activitiesData = $this->modelActivities->getPackageActivity($id)->getResult();
        $data = [
            'title' => $this->title,
            'objectData' => $objectData,
            'aparData' => $aparData,
            'facilityPackage' => $facilityPackage,
            'activitiesData' => $activitiesData

        ];
        return view('admin-detail/detail_package', $data);
    }

    public function edit($id = null)
    {
        $objectData = $this->model->getPackage($id)->getRow();
        $activitiesData = $this->modelActivities->getActivity($id)->getResult();
        $data = [
            'title' => $this->title,
            'config' => config('Auth'),
            'objectData' => $objectData,
            'activitiesData' => $activitiesData
        ];
        return view('admin-edit/edit_package', $data);
    }

    public function save_update($id = null)
    {
        // ---------------------Data request-----------------------------
        $request = $this->request->getPost();
        $updateRequest = [
            'name' => $this->request->getPost('name'),
            'min_capacity' => $this->request->getPost('min_capacity'),
            'price' => $this->request->getPost('price'),
            'contact_person' => $this->request->getPost('contact_person'),
            'description' => $this->request->getPost('description')
        ];
        // ---------------------------------Update---------------------
        $update =  $this->model->updatePackage($id, $updateRequest);
        if ($update) {
            // -----------------------------Gallery-----------------------------------------
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
                $updateGallery =  $this->model->updateGallery($id, $gallery);
            } else {
                $updateGallery =   $this->model->deleteGallery($id);
            }
        }

        if ($update && $updateGallery) {
            session()->setFlashdata('success', 'Success! Atraction updated.');
            return redirect()->to(site_url('manage_atraction/edit/' . $id));
        } else {
            session()->setFlashdata('failed', 'Failed! Failed to update atraction.');
            return redirect()->to(site_url('manage_atraction/edit/' . $id));
        }
    }
    public function insert()
    {
        $activitiesData = $this->modelActivities->getActivities()->getResult();
        $data = [
            'title' => $this->title,
            'activitiesData' => $activitiesData
        ];
        return view('admin-insert/insert_package', $data);
    }
    public function save_insert()
    {

        // ---------------------Data request------------------------------------
        $request = $this->request->getPost();
        $id = $this->model->get_new_id();

        foreach ($request['gallery'] as $key => $value) {
            if (!strlen($value)) {
                unset($request['gallery'][$key]);
            }
        }
        if ($request['gallery']) {
            $folders = $request['gallery'];
            foreach ($folders as $folder) {
                $filepath = WRITEPATH . 'uploads/' . $folder;
                $filenames = get_filenames($filepath);
                $fileImg = new File($filepath . '/' . $filenames[0]);
                $fileImg->move(FCPATH . 'media/photos/package');
                delete_files($filepath);
                rmdir($filepath);
                $gallery = $fileImg->getFilename();
            }
        } else {
            $gallery = '';
        }
        $insertRequest = [
            'id' => $id,
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'min_capacity' => $this->request->getPost('min_capacity'),
            'contact_person' => $this->request->getPost('contact_person'),
            'brosur_url' => $gallery,
            'description' => $this->request->getPost('description')
        ];

        $insert =  $this->model->addPackage($insertRequest);
        if ($insert) {
            // insert activities
            $activities_id = $this->request->getPost('activities');
            foreach ($activities_id as $activity_id) {
                $this->modelActivities->addPackageActivities(['package_id' => $id, 'activities_id' => $activity_id]);
            }
        }
        if ($insert) {
            session()->setFlashdata('success', 'Success! Data Added.');
            return redirect()->to(site_url('manage_package'));
        } else {
            session()->setFlashdata('failed', 'Failed! Failed to add data.');
            return redirect()->to(site_url('manage_package/insert'));
        }
    }
    public function delete($id)
    {
        $delete =  $this->model->deletePackage($id);
        if ($delete) {
            session()->setFlashdata('success', 'Success! package Deleted.');
            return redirect()->to(site_url('manage_package'));
        } else {
            session()->setFlashdata('failed', 'Failed to delete package ');
            return redirect()->to(site_url('manage_package'));
        }
    }
}
