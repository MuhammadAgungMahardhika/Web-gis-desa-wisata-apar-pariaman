<?php

namespace App\Controllers;

use App\Models\atractionModel;

class DetailObjectController extends BaseController
{

    protected $modelReview, $modelApar, $modelEvent, $modelAtraction, $modelSouvenir, $modelCulinary, $modelWorship, $modelFacility;
    protected $title =  'List Object | Tourism Village';
    public function __construct()
    {
        $this->modelReview = new \App\Models\reviewModel();
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
        $count_rating = $this->modelReview->getRating($id)->getRow();
        $objectData = $this->modelAtraction->getAtraction($id)->getRow();
        $galleryData = $this->modelAtraction->getGallery($id)->getResult();
        $aparData =  $this->modelApar->getApar();
        if (is_object($objectData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'count_rating' => $count_rating,
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

        if (is_object($objectData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'objectData' => $objectData,
                'galleryData'   => $galleryData,
                'url' => 'event',
                'aparData' => $this->modelApar->getApar()
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
