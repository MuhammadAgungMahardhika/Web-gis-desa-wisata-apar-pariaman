<?php

namespace App\Controllers;

class ReviewController extends BaseController
{

    protected $modelReview;
    // Constructor
    public function __construct()
    {
        $this->modelReview = new \App\Models\reviewModel();
    }
    // 3. Manage atraction
    public function atraction($id)
    {
        //untuk ajax
        if ($this->request->isAJAX()) {
            if ($id) {
                $like = $this->modelReview->addLikes($id);
                return json_encode($like);
            }
        }
    }
}
