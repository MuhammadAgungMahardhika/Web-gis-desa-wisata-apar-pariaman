<?php

namespace App\Controllers;

use App\Models\eventModel;

class ManageEventController extends BaseController
{
    protected $model, $validation;
    protected $title = 'Manage-Event | Tourism Village';
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->model = new \App\Models\eventModel();
    }

    public function index()
    {
        $eventData = $this->model->getEvents();
        $data = [
            'title' => $this->title,
            'eventData' => $eventData
        ];

        return view('admin/manage_event', $data);
    }

    public function detail($id = null)
    {
        $eventData = $this->model->getEvent($id)->getRow();
        if (is_object($eventData)) {

            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'eventData' => $eventData
            ];
            return view('admin-detail/detail_event', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit($id = null)
    {
        $eventData = $this->model->getEvent($id)->getRow();

        if (is_object($eventData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'eventData' => $eventData
            ];
            return view('admin-edit/edit_event', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function save_update($id = null)
    {

        //validation data
        $validateRules = $this->validate([
            'name' => 'required|max_length[50]',
            'schedule' => 'required|max_length[31]',
            'price' => 'max_length[50]',
            'contact_person' => 'max_length[14]',
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
                session()->setFlashdata('success', 'Success! Event updated.');
                return redirect()->to(site_url('manage_event/edit/' . $id));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed to update atraction.');
            return redirect()->to(site_url('manage_event/edit/' . $id));
        }
    }

    public function insert()
    {

        $data = [
            'title' => $this->title,
        ];
        return view('admin-insert/insert_event', $data);
    }
    public function save_insert()
    {
        //validation data
        $validateRules = $this->validate([
            'id' => 'is_unique[event.id]|required|max_length[10]',
            'name' => 'required|max_length[50]',
            'schedule' => 'required|max_length[100]',
            'price' => 'max_length[50]',
            'contact_person' => 'max_length[14]',
            'description' => 'max_length[255]',
            'lat' => 'required|max_length[20]',
            'lng' => 'required|max_length[20]'
        ]);

        if ($validateRules) {
            try {
                $insertRequest = $this->request->getPOST();
                $this->model->addEvent($insertRequest);
            } catch (\Exception $e) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound($e);
            } finally {
                session()->setFlashdata('success', 'Success! Data Added.');
                return redirect()->to(site_url('manage_event'));
            }
        } else {
            $listErrors = $this->validation->listErrors();
            session()->setFlashdata('failed', 'Failed! Failed to add data.');
            return redirect()->to(site_url('manage_event/insert'));
        }
    }
    public function delete($id)
    {

        try {
            $this->model->deleteEvent($id);
        } catch (\Exception $e) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound($e);
        } finally {
            session()->setFlashdata('success', 'Success! Event Deleted.');
            return redirect()->to(site_url('manage_event'));
        }
    }
}
