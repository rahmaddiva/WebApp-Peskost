<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\KostModel;
use App\Models\PemesananModel;
use CodeIgniter\HTTP\ResponseInterface;

class PemesananController extends BaseController
{

    protected $usersModel;
    protected $kostModel;
    protected $pemesananModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->kostModel = new KostModel();
        $this->pemesananModel = new PemesananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Pemesanan',
            'pemesanan' => $this->pemesananModel->getPemesanan(),
            'kost' => $this->kostModel->findAll(),
        ];
        return view('pemesanan/index', $data);
    }

    public function proses_pemesanan()
    {

    }
}
