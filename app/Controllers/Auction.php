<?php

namespace App\Controllers;

use App\Models\AuctionModel;
use App\Models\TypeModel;

class Auction extends BaseController
{


    protected $auctionModel;
    protected $typeauctionModel;

    public function __construct()
    {
        // Load model
        $this->auctionModel = new AuctionModel();
        $this->typeauctionModel = new TypeModel();
    }

    public function index()
    {
        // return view('insert_view');
    }

    public function uploaddata()
    {

        $model = new TypeModel();
        $data['type_action'] = $model->getType(); // Fetch all articles

        return view('upload_view', $data);
    }

    public function insertt()
    {
        // return view('insert_view');
        $this->auctionModel->findAll();
    }
}
