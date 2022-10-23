<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use Myth\Auth\Password;

class MobileController extends BaseController
{
    use ResponseTrait;
    protected $auth;
    protected $modelUser, $modelApar, $modelEvent, $modelAtraction, $modelPackage, $modelFp, $modelAc, $modelProduct, $modelSouvenir, $modelCulinary, $modelWorship, $modelFacility;
    protected $title =  'List Object | Tourism Village';
    public function __construct()
    {
        $this->auth = service('authentication');
        $this->modelUser = new \App\Models\usersModel();
        $this->modelApar = new \App\Models\aparModel();
        $this->modelAtraction = new \App\Models\atractionModel();
        $this->modelPackage = new \App\Models\packageModel();
        $this->modelFp = new \App\Models\facilityPackageModel();
        $this->modelAc = new \App\Models\activitiesModel();
        $this->modelProduct = new \App\Models\productModel();
        $this->modelEvent = new \App\Models\eventModel();
        $this->modelSouvenir = new \App\Models\souvenirPlaceModel();
        $this->modelCulinary = new \App\Models\culinaryPlaceModel();
        $this->modelWorship = new \App\Models\worshipPlaceModel();
        $this->modelFacility = new \App\Models\facilityModel();
    }

    public function login()
    {

        $login = $this->request->getPost('login');
        $password = $this->request->getPost('password');

        // Determine credential type
        $type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        // Try to log them in...
        if (!$this->auth->attempt([$type => $login, 'password' => $password], false)) {
            $contents = $this->auth->error();
            $response = [
                'data' => $contents,
                'status' => 400,
                'message' => [
                    "Error login"
                ]
            ];
            return $this->respond($response, 400);
        }
        $redirectURL = session('redirect_url') ?? site_url('/list_object');
        unset($_SESSION['redirect_url']);

        $contents = [
            'url' => $redirectURL,
            'user' => user(),
            'in_group' => in_groups('user') || in_groups('admin')
        ];
        $response = [
            'data' => $contents,
            'status' => 200,
            'message' => [
                "Success login"
            ]
        ];
        return $this->respond($response, 200);
    }
    public function logout()
    {
        if ($this->auth->check()) {
            $this->auth->logout();
        }

        $response = [
            'status' => 200,
            'message' => [
                "Successfully logged out"
            ]
        ];
        return $this->respond($response, 200);
    }

    public function profile()
    {
        $id = $this->request->getPost('id');
        if (logged_in()) {
            if (user()->id == $id) {
                $contents = user();
                $response = [
                    'data' => $contents,
                    'status' => 200,
                    'message' => [
                        "Getting user data"
                    ]
                ];
                return $this->respond($response, 200);
            }
        }
        $response = [
            'status' => 400,
            'message' => [
                "Failed get user data"
            ]
        ];
        return $this->respond($response, 400);
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

        return view('mobile/map-body', $data);
    }

    public function atraction($id = null)
    {
        if ($id) {
            $objectData = $this->modelAtraction->getAtraction($id)->getResult();
        } else {
            $objectData = array();
            $atractions = $this->modelAtraction->getAtractions();
            foreach ($atractions as $atraction) {
                $list_gallery = $this->modelAtraction->getGallery($atraction->id)->getResultArray();
                if ($list_gallery) {
                    $galleries = array();
                    foreach ($list_gallery as $gallery) {
                        $galleries[] = $gallery['url'];
                    }
                    $atraction->gallery = $galleries[0];
                    $objectData[] = $atraction;
                } else {
                    $atraction->gallery = '';
                    $objectData[] = $atraction;
                }
            }
        }
        $response = [
            'data' => $objectData,
            'status' => 200,
            'message' => [
                "Success get list of atraction"
            ]
        ];
        return $this->respond($response);
    }
    public function atraction_by_name($name = null)
    {
        if ($name) {
            $objectData = $this->modelAtraction->getAtractionByName($name)->getResult();
        }
        $data = [
            'objectData' => $objectData,
            'url' => 'atraction'
        ];
        return json_encode($data);
    }

    public function atraction_by_rate($rate = null)
    {
        if ($rate) {
            $objectData = $this->modelAtraction->getAtractionByRate($rate)->getResult();
        }
        $data = [
            'objectData' => $objectData,
            'url' => 'atraction'
        ];
        return json_encode($data);
    }
    public function atraction_by_category($category = null)
    {
        if ($category) {
            $objectData = $this->modelAtraction->getAtractionByCategory($category)->getResult();
        } else {
            $objectData = $this->modelAtraction->getCategory()->getResult();
        }
        $data = [
            'objectData' => $objectData,
            'url' => 'atraction'
        ];
        return json_encode($data);
    }

    public function detail_atraction($id = null)
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
                'currentUrl' => 'mobile',
                'aparData' => $aparData
            ];
            return view('user-menu/detail_object', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    // Package
    public function package($id = null)
    {
        if ($id) {
            $objectData = $this->modelPackage->getPackage($id)->getResult();
        } else {
            $objectData = $this->modelPackage->getPackages();
        }
        $response = [
            'data' => $objectData,
            'status' => 200,
            'message' => [
                "Success get list of package"
            ]
        ];
        return $this->respond($response);
    }

    public function detail_package($id = null)
    {
        $objectData = $this->modelPackage->getPackage($id)->getRow();
        $facilityPackage = $this->modelFp->getFacilityPackage($id)->getResult();
        $activitiesData = $this->modelAc->getActivities($id)->getResult();
        $activitiesGallery = array();
        foreach ($activitiesData as $activities) {
            array_push($activitiesGallery, $this->modelAc->getGallery($activities->id)->getResult());
        }
        $facilityPackage = $this->modelFp->getFacilityPackage($id)->getResult();
        // $galleryData = $this->modelPackage->getGallery($id)->getResult();
        // $aparData =  $this->modelApar->getApar();
        if (is_object($objectData)) {
            $data = [
                'title' => $this->title,
                'config' => config('Auth'),
                'objectData' => $objectData,
                'facilityPackage' => $facilityPackage,
                'activitiesData' => $activitiesData,
                // 'galleryData'  => $galleryData,
                'currentUrl' => 'mobile',
                // 'aparData' => $aparData
            ];
            return view('user-menu/detail_package', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }


    public function event($id = null)
    {
        if ($id) {
            $objectData = $this->modelEvent->getEvent($id)->getResult();
        } else {
            $objectData = array();
            $atractions = $this->modelEvent->getEvents();
            foreach ($atractions as $atraction) {
                $list_gallery = $this->modelEvent->getGallery($atraction->id)->getResultArray();
                if ($list_gallery) {
                    $galleries = array();
                    foreach ($list_gallery as $gallery) {
                        $galleries[] = $gallery['url'];
                    }
                    $atraction->gallery = $galleries[0];
                    $objectData[] = $atraction;
                } else {
                    $atraction->gallery = '';
                    $objectData[] = $atraction;
                }
            }
        }
        $response = [
            'data' => $objectData,
            'status' => 200,
            'message' => [
                "Success get list of atraction"
            ]
        ];
        return $this->respond($response);
    }

    public function event_by_name($name = null)
    {
        if ($name) {
            $objectData = $this->modelEvent->getEventByName($name)->getResult();
        }
        $data = [
            'objectData' => $objectData,
            'url' => 'event'
        ];
        return json_encode($data);
    }
    public function event_by_date($date_1 = null, $date_2 = null)
    {

        if ($date_1 && $date_2) {
            $objectData = $this->modelEvent->getEventByDate($date_1, $date_2)->getResult();
        }
        $data = [
            'objectData' => $objectData,
            'url' => 'event'
        ];
        return json_encode($data);
    }
    public function event_by_rate($rate = null)
    {
        if ($rate) {
            $objectData = $this->modelEvent->getEventByRate($rate)->getResult();
        }
        $data = [
            'objectData' => $objectData,
            'url' => 'event'
        ];
        return json_encode($data);
    }

    public function detail_event($id = null)
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
                'currentUrl' => "mobile",
                'aparData' => $aparData
            ];

            return view('mobile/detail_object', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }


    public function souvenir_place($id = null)
    {
        if ($id) {
            $objectData = $this->modelSouvenir->getSouvenirPlace($id)->getResult();
            $galleryData = $this->modelSouvenir->getGallery($id)->getResult();
            // $productData =  $this->modelSouvenir->getProduct($id)->getResult();
            $data['objectData'] = $objectData;
            $data['url'] = 'souvenir_place';
            $data['galleryData'] = $galleryData;
            // $data['productData'] = $productData;
        } else {
            $objectData = $this->modelSouvenir->getSouvenirPlaces();
            $data = [
                'objectData' => $objectData,
                'url' => 'souvenir_place'
            ];
        }
        return json_encode($data);
    }
    public function culinary_place($id = null)
    {
        if ($id) {
            $objectData = $this->modelCulinary->getCulinaryPlace($id)->getResult();
            $galleryData = $this->modelCulinary->getGallery($id)->getResult();
            // $menuData =  $this->modelCulinary->getMenu($id)->getResult();
            $data['objectData'] = $objectData;
            $data['url'] = 'culinary_place';
            $data['galleryData'] = $galleryData;
            // $data['menuData'] = $menuData;
        } else {
            $objectData = $this->modelCulinary->getCulinaryPlaces();
            $data = [
                'objectData' => $objectData,
                'url' => 'culinary_place'
            ];
        }
        return json_encode($data);
    }
    public function worship_place($id = null)
    {
        if ($id) {
            $objectData = $this->modelWorship->getWorshipPlace($id)->getResult();
            $galleryData = $this->modelWorship->getGallery($id)->getResult();
            $data['objectData'] = $objectData;
            $data['url'] = 'worship_place';
            $data['galleryData'] = $galleryData;
        } else {
            $objectData = $this->modelWorship->getWorshipPlaces();
            $data = [
                'objectData' => $objectData,
                'url' => 'worship_place'
            ];
        }
        return json_encode($data);
    }
    public function facility($id = null)
    {
        if ($id) {
            $objectData = $this->modelFacility->getFacility($id)->getResult();
            $galleryData = $this->modelFacility->getGallery($id)->getResult();
            $data['objectData'] = $objectData;
            $data['url'] = 'facility';
            $data['galleryData'] = $galleryData;
        } else {
            $objectData = $this->modelFacility->getFacilities();
            $data = [
                'objectData' => $objectData,
                'url' => 'facility'
            ];
        }
        return json_encode($data);
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
