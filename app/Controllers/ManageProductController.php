<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class ManageProductController extends BaseController
{
    protected $model, $modelApar, $validation, $helpers = ['auth', 'url', 'filesystem'];
    protected $title = 'Manage-Products | Tourism Village';
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->model = new \App\Models\productModel();
        $this->modelApar = new \App\Models\aparModel();
    }
    public function index()
    {
        $objectData = $this->model->getProducts()->getResult();
        $data = [
            'title' => $this->title,
            'objectData' => $objectData
        ];
        return view('admin/manage_product', $data);
    }
    public function detail($id = null)
    {
        $objectData = $this->model->getProduct($id)->getRow();
        $data = [
            'title' => $this->title,
            'config' => config('Auth'),
            'objectData' => $objectData,
        ];
        return view('admin-detail/detail_product', $data);
    }

    public function edit($id = null)
    {
        $objectData = $this->model->getProduct($id)->getRow();
        $categoryData = $this->model->getCategory()->getResult();
        $data = [
            'title' => $this->title,
            'config' => config('Auth'),
            'objectData' => $objectData,
            'categoryData' => $categoryData
        ];
        return view('admin-edit/edit_product', $data);
    }

    public function save_update($id = null)
    {
        // ---------------------Data request-----------------------------
        $request = $this->request->getPost();
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
                $fileImg->move(FCPATH . 'media/photos/product');
                delete_files($filepath);
                rmdir($filepath);
                $gallery = $fileImg->getFilename();
            }
        } else {
            $gallery = '';
        }

        $updateRequest = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'product_category_id' => $this->request->getPost('category'),
            'brosur_url' => $gallery,
            'description' => $this->request->getPost('description')
        ];

        $update =  $this->model->updateProduct($id, $updateRequest);
        if ($update) {
            session()->setFlashdata('success', 'Success! Product updated.');
            return redirect()->to(site_url('manage_product/edit/' . $id));
        } else {
            session()->setFlashdata('failed', 'Failed! Failed to update product.');
            return redirect()->to(site_url('manage_product/edit/' . $id));
        }
    }
    public function insert()
    {
        $categoryData = $this->model->getCategory()->getResult();
        $data = [
            'title' => $this->title,
            'categoryData' => $categoryData
        ];
        return view('admin-insert/insert_product', $data);
    }
    public function save_insert()
    {
        // ---------------------Data request------------------------------------
        $request = $this->request->getPost();
        $id = $this->model->get_new_id();

        // ----------------Gallery-----------------------------------------

        // check if gallery have empty string then make it become empty array
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
                $fileImg->move(FCPATH . 'media/photos/product');
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
            'product_category_id' => $this->request->getPost('category'),
            'price' => $this->request->getPost('price'),
            'brosur_url' => $gallery,
            'description' => $this->request->getPost('description')
        ];

        $insert =  $this->model->addProduct($insertRequest);

        if ($insert) {
            session()->setFlashdata('success', 'Success! Data Added.');
            return redirect()->to(site_url('manage_product'));
        } else {
            session()->setFlashdata('failed', 'Failed! Failed to add data.');
            return redirect()->to(site_url('manage_product/insert'));
        }
    }
    public function delete($id)
    {
        $delete =  $this->model->deleteProduct($id);
        if ($delete) {
            session()->setFlashdata('success', 'Success! product Deleted.');
            return redirect()->to(site_url('manage_product'));
        } else {
            session()->setFlashdata('failed', 'Failed to delete product ');
            return redirect()->to(site_url('manage_product'));
        }
    }
}
