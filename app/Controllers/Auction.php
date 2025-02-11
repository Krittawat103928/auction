<?php

namespace App\Controllers;

use App\Models\AuctionModel;

class Auction extends BaseController
{


    protected $auctionModel;

    public function __construct()
    {
        // Load model
        $this->auctionModel = new AuctionModel();
    }
    public function index(): string
    {
        // return view('insert_view');
    }

    public function uploaddata()
    {
        return view('upload_view');
    }

    public function insertt()
    {
        // return view('insert_view');
        $this->auctionModel->findAll();
    }
}
