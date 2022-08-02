<?php

namespace App\Controllers;

use App\Models\atractionModel;

class ListObjectController extends BaseController
{
    protected $modelApar, $modelEvent, $modelAtraction, $modelSouvenir, $modelCulinary, $modelWorship, $modelFacility;
    protected $title =  'List Object | Tourism Village';
    public function __construct()
    {
        $this->modelApar = new \App\Models\aparModel();
        $this->modelAtraction = new \App\Models\atractionModel();
        $this->modelEvent = new \App\Models\eventModel();
        $this->modelSouvenir = new \App\Models\souvenirPlaceModel();
        $this->modelCulinary = new \App\Models\culinaryPlaceModel();
        $this->modelWorship = new \App\Models\worshipPlaceModel();
        $this->modelFacility = new \App\Models\facilityModel();
    }

    public function index()
    {
        //direct biasa
        $aparData = $this->modelApar->getApar();
        $objectData = null;
        $data = [
            'title' => $this->title,
            'panelList' => 'uniqe atraction',
            'config' => config('Auth'),
            'url' => 'index',
            'objectData' => $objectData,
            'aparData' => $aparData
        ];

        return view('user-menu/list_object', $data);
    }

    // list atraction page
    public function atraction($id = null)
    {
        //untuk ajax
        if ($this->request->isAJAX()) {
            if ($id) {
                $objectData = $this->modelAtraction->getAtraction($id)->getResult();
            } else {
                $objectData = $this->modelAtraction->getAtractions();
            }
            $data = [
                'atData' =>  $objectData,
                'url' => 'atraction'
            ];

            return json_encode($data);
        }
    }
    public function atraction_by_name($name = null)
    {

        if ($this->request->isAJAX()) {
            if ($name) {
                $objectData = $this->modelAtraction->getAtractionByName($name)->getResult();
            }

            $data = [
                'atData' => $objectData,
                'url' => 'atraction'
            ];
            return json_encode($data);
        }
    }

    // list event page
    public function event($id = null)
    {
        //untuk ajax
        if ($this->request->isAJAX()) {
            if ($id) {
                $objectData = $this->modelEvent->getEvent($id)->getResult();
            } else {
                $objectData = $this->modelEvent->getEvents();
            }

            $data = [
                'evData' => $objectData,
                'url' => 'event'
            ];
            return json_encode($data);
        }
    }

    public function event_by_name($name = null)
    {

        if ($this->request->isAJAX()) {
            if ($name) {
                $objectData = $this->modelEvent->getEventByName($name)->getResult();
            }

            $data = [
                'evData' => $objectData,
                'url' => 'event'
            ];
            return json_encode($data);
        }
    }

    public function souvenir_place($id = null)
    {
        //untuk ajax
        if ($this->request->isAJAX()) {
            if ($id) {
                $objectData = $this->modelSouvenir->getSouvenirPlace($id)->getResult();
            } else {
                $objectData = $this->modelSouvenir->getSouvenirPlaces();
            }
            $data = [
                'objectData' => $objectData,
                'url' => 'souvenir_place'
            ];
            return json_encode($data);
        }
    }
    public function culinary_place($id = null)
    {
        //Untuk ajax
        if ($this->request->isAJAX()) {
            if ($id) {
                $objectData = $this->modelCulinary->getCulinaryPlace($id)->getResult();
            } else {
                $objectData = $this->modelCulinary->getCulinaryPlaces();
            }
            $data = [
                'objectData' => $objectData,
                'url' => 'culinary_place'
            ];
            return json_encode($data);
        }
    }
    public function worship_place($id = null)
    {
        //Untuk ajax
        if ($this->request->isAJAX()) {
            if ($id) {
                $objectData = $this->modelWorship->getWorshipPlace($id)->getResult();
            } else {
                $objectData = $this->modelWorship->getWorshipPlaces();
            }
            $data = [
                'objectData' => $objectData,
                'url' => 'worship_place'
            ];
            return json_encode($data);
        }
    }
    public function facility($id = null)
    {
        //untuk ajax
        if ($this->request->isAJAX()) {
            if ($id) {
                $objectData = $this->modelFacility->getFacility($id)->getResult();
            } else {
                $objectData = $this->modelFacility->getFacilities();
            }
            $data = [
                'objectData' => $objectData,
                'url' => 'facility'
            ];
            return json_encode($data);
        }
    }

    public function search_main_nearby($distance = null)
    {
        $main = $_GET['main'];
        $lat = $_GET['lat'];
        $lng = $_GET['lng'];

        if ($main == 'atraction') {
            $data['atData']  = $this->modelAtraction->getRadiusValue($lng, $lat, $distance)->getResult();
            $data['atUrl'] = 'atraction';
        } else if ($main == 'event') {
            $data['evData']  = $this->modelEvent->getRadiusValue($lng, $lat, $distance)->getResult();
            $data['evUrl'] = 'event';
        }

        return json_encode($data);
    }
    public function search_support_nearby($distance = null)
    {
        $cp = $_GET['cp'];
        $wp = $_GET['wp'];
        $sp = $_GET['sp'];
        $f =  $_GET['f'];

        $lat = $_GET['lat'];
        $lng = $_GET['lng'];

        if ($cp == 'true') {
            $data['cpData']  = $this->modelCulinary->getRadiusValue($lng, $lat, $distance)->getResult();
            $data['cpUrl'] = 'culinary_place';
        }
        if ($sp == 'true') {
            $data['spData']  = $this->modelSouvenir->getRadiusValue($lng, $lat, $distance)->getResult();
            $data['spUrl'] = 'souvenir_place';
        }
        if ($wp == 'true') {
            $data['wpData']  = $this->modelWorship->getRadiusValue($lng, $lat, $distance)->getResult();
            $data['wpUrl'] = 'worship_place';
        }
        if ($f == 'true') {
            $data['fData']  = $this->modelFacility->getRadiusValue($lng, $lat, $distance)->getResult();
            $data['fUrl'] = 'facility';
        }
        if ($data) {
            return json_encode($data);
        } else {
            return json_encode('salah');
        }
    }
}
