<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LandingpageController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Landing Page',
            'content' => 'landingpage/index'
        ];

        return view('landingpage/index', $data);
    }
}
