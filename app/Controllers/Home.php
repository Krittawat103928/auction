<?php

namespace App\Controllers;

use App\Models\AuctionModel;

class Home extends BaseController
{
    protected $auctionModel;

    public function __construct()
    {
        // Load model
        $this->auctionModel = new AuctionModel();
    }
    public function index(): string
    {
        return view('welcome_message');
    }


    public function load_ajax()
    {

        // $oder_by = " order by document_year DESC";
        // $document_type = 1;
        $post = $this->request->getPost();

        if ($post != NULL) {
            $draw = $post['draw'];
            $row = $post['start'];
            $rowperpage = $post['length']; // Rows display per page
            $columnIndex = $post['order'][0]['column']; // Column index
            $columnName = $post['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $post['order'][0]['dir']; // asc or desc
            $searchValue = $post['search']['value']; // Search value
        }


        if ($columnIndex == 1) {
            $oder_by = " order by auction_date " . $columnSortOrder;
        } else {
            $oder_by = "";
        }


        // }

        ## Search 
        $searchQuery = " ";
        if ($searchValue != '') {
            $searchQuery = " (auction_name like '%" . $searchValue . "%'') and ";
        }

        $searchgroup = "";
        $searchdivision = "";
        $searchjob = "";
        $search_name_activity = "";
        $search_year = "";
        $search_FK_document_filter_id = "";
        $search_FK_document_type_id = "";



        $text_search = $searchQuery . $search_year;

        ## Total number of records without filtering

        $db = db_connect();

        $sel = "select count(*) as allcount from auctions WHERE 1 ";
        $records = $db->query($sel)->getResultArray();
        $totalRecords = $records[0]['allcount'];

        ## Total number of record with filtering
        $sel = "select count(*) as allcount from auctions WHERE 1";
        $records = $db->query($sel)->getResultArray();
        $totalRecordwithFilter = $records[0]["allcount"];


        ## Fetch records
        $empQuery = "select *  from auctions " . $oder_by . " limit " . $row . ", " . $rowperpage;
        $empQuery2 = $db->query($empQuery, FALSE);
        $data = array();

        $num = $row + 1;
        foreach ($empQuery2->getResultArray() as $value) {





            $text_type = "";

            $job_text = "";
            $data[] = array(
                "id" => '<div style="text-align: center;">' . $num . '<div>',
                "auction_code" => '<div style="text-align: center;">' . $value["auction_code"] . '<div>',
                "auction_name" => '<div style="font-size: 0.8em;">' . $value["auction_name"] . $text_type . '</div>',
                "auction_price" => '<div style="font-size: 0.8em;">' . 1 . '<div>',
                "auction_date" => $value["auction_date"],
            );
            $num++;
        }
        // <a type="button" class="btn btn-primary btn-xs" href="' . base_url() . $path_pdf  . '"  data-target="#modalalert"><i class="fa-solid fa-eye"></i> พรีวิว</a>

        // <a type="button" class="btn btn-primary btn-xs" href="' . base_url("home/preview_pdf/") . $text_path . '" target="_blank" ><i class="fa-solid fa-eye"></i> พรีวิว</a>
        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data,
            "login" => "login",
            // "csrfHash" => $this->security->get_csrf_hash(),
            // "csrfName" =>  $this->security->get_csrf_token_name()
        );

        return json_encode($response);
    }


    public function insertAuction()
    {


        // Step 1: Create a DateTime object
        $datetime = new \DateTime();

        // Step 2: Format the DateTime to MySQL format
        $formattedDate = $datetime->format('Y-m-d H:i:s');
        for ($i = 2; $i <= 12; $i++) {
            echo "The number is: $i<br>";
            $data['auction_code'] = rand();
            $data['auction_name'] = "name_" . $i;
            $data['auction_price'] = 100000000;
            $data['auction_date'] = $formattedDate;
            $data['created_at'] = $formattedDate;

            $this->auctionModel->insertAuction($data);
        }



    }
}
