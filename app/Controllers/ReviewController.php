<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class ReviewController extends BaseController
{
    protected $modelReview;
    // Constructor
    public function __construct()
    {
        $this->modelReview = new \App\Models\reviewModel();
    }
    // 3. Manage atraction
    public function atraction()
    {
        //untuk ajax
        if ($this->request->isAJAX()) {
            $data = $this->request->getPOST();
            $user_id = $this->request->getPOST('user_id');
            $atraction_id = $this->request->getPOST('atraction_id');
            $ratingValue = $this->request->getPOST('rating');
            // $event_id = $this->request->getPOST('event_id');

            if ($user_id && $atraction_id) {
                $check = $this->modelReview->check($user_id, $atraction_id)->getRow();
                // check rating alredy exist or not // if exist update // if not insert
                if ($check->rating != null) {
                    date_default_timezone_set('Asia/Jakarta');
                    $data['updated_date'] =  date('H-m-d H:i:s');
                    $rating = $this->modelReview->updateAtractionRating($data, $user_id, $atraction_id);
                    if ($rating == true) {
                        return json_encode($rating);
                    }
                } else {
                    $rating = $this->modelReview->addRating($data);
                    if ($rating == true) {
                        return json_encode($rating);
                    }
                }
            }
        }
    }
}
