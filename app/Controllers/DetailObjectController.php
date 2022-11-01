<?php

namespace App\Controllers;

class DetailObjectController extends BaseController
{

    protected $modelRating, $modelApar, $modelEvent, $modelAtraction, $modelSouvenir, $modelCulinary, $modelWorship, $modelFacility;
    protected $title =  'List Object | Tourism Village';
    public function __construct()
    {
        $this->modelRating = new \App\Models\ratingModel();
        $this->modelApar = new \App\Models\aparModel();
        $this->modelAtraction = new \App\Models\atractionModel();
        $this->modelEvent = new \App\Models\eventModel();
        $this->modelSouvenir = new \App\Models\souvenirPlaceModel();
        $this->modelCulinary = new \App\Models\culinaryPlaceModel();
        $this->modelWorship = new \App\Models\worshipPlaceModel();
        $this->modelFacility = new \App\Models\facilityModel();
    }

    public function atraction($id = null)
    {
        $objectData = $this->modelAtraction->getAtraction($id)->getRow();
        $galleryData = $this->modelAtraction->getGallery($id)->getResult();
        $aparData =  $this->modelApar->getApar();

        //untuk ajax
        if ($this->request->isAJAX()) {
            $user_id = $this->request->getGet('user_id');
            if ($id) {
                $countRating = $this->modelRating->getRating($id, 'atraction_id')->getRow();
                $userTotal = $this->modelRating->getUserTotal($id, 'atraction_id')->getRow();
                $userRating = $this->modelRating->getUserRating($user_id, 'atraction_id', $id)->getRow();
            }
            $data = [
                'countRating' =>  $countRating,
                'userTotal' =>  $userTotal,
                'userRating' => $userRating
            ];
            return json_encode($data);
        }
        if (is_object($objectData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'objectData' => $objectData,
                'galleryData'  => $galleryData,
                'url' =>  'atraction',
                'aparData' => $aparData
            ];
            return view('user-menu/detail_object', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function event($id = null)
    {
        $objectData = $this->modelEvent->getEvent($id)->getRow();
        $galleryData = $this->modelEvent->getGallery($id)->getResult();
        $aparData =  $this->modelApar->getApar();

        //untuk ajax
        if ($this->request->isAJAX()) {
            $user_id = $this->request->getGet('user_id');
            if ($id) {
                $countRating = $this->modelRating->getRating($id, 'event_id')->getRow();
                $userTotal = $this->modelRating->getUserTotal($id, 'event_id')->getRow();
                $userRating = $this->modelRating->getUserRating($user_id, 'event_id', $id)->getRow();
            }
            $data = [
                'countRating' =>  $countRating,
                'userTotal' =>  $userTotal,
                'userRating' => $userRating
            ];
            return json_encode($data);
        }
        if (is_object($objectData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'objectData' => $objectData,
                'galleryData'   => $galleryData,
                'url' => 'event',
                'aparData' => $aparData
            ];

            return view('user-menu/detail_object', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function culinary_place($id = null)
    {
        $objectData = $this->modelCulinary->getCulinaryPlace($id)->getRow();
        $galleryData = $this->modelCulinary->getGallery($id)->getResult();
        $menuData =  $this->modelCulinary->getMenu($id)->getResult();
        if (is_object($objectData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'objectData' => $objectData,
                'galleryData'   => $galleryData,
                'menuData'  => $menuData,
                'url' => 'culinary_place',
                'aparData' => $this->modelApar->getApar()
            ];

            return view('user-menu/detail_object', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function worship_place($id = null)
    {
        $objectData = $this->modelWorship->getWorshipPlace($id)->getRow();
        $galleryData = $this->modelWorship->getGallery($id)->getResult();

        if (is_object($objectData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'objectData' => $objectData,
                'galleryData'   => $galleryData,
                'url' => 'worship_place',
                'aparData' => $this->modelApar->getApar()
            ];

            return view('user-menu/detail_object', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function souvenir_place($id = null)
    {
        $objectData = $this->modelSouvenir->getSouvenirPlace($id)->getRow();
        $galleryData = $this->modelSouvenir->getGallery($id)->getResult();
        $productData =  $this->modelSouvenir->getProduct($id)->getResult();
        if (is_object($objectData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'objectData' => $objectData,
                'galleryData'   => $galleryData,
                'productData' => $productData,
                'url' => 'souvenir_place',
                'aparData' => $this->modelApar->getApar()
            ];

            return view('user-menu/detail_object', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function facility($id = null)
    {
        $objectData = $this->modelFacility->getFacility($id)->getRow();
        $galleryData = $this->modelFacility->getGallery($id)->getResult();

        if (is_object($objectData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'objectData' => $objectData,
                'galleryData'   => $galleryData,
                'url' => 'facility',
                'aparData' => $this->modelApar->getApar()
            ];
            return view('user-menu/detail_object', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
