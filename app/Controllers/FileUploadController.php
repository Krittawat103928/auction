<?php

namespace App\Controllers;

use App\Models\AuctionModel;
use App\Models\FileModel;
use CodeIgniter\Files\File;

class FileUploadController extends BaseController
{
    protected $fileModel;
    protected $auctionModel;

    public function __construct()
    {
        // Load model
        $this->auctionModel = new AuctionModel();

        $this->fileModel = new FileModel();
    }

    public function index()
    {
        return view('file_upload_form2');
    }

    public function uploadFiles()
    {


        // Step 1: Create a DateTime object
        $datetime = new \DateTime();

        // Step 2: Format the DateTime to MySQL format
        $formattedDate = $datetime->format('Y-m-d H:i:s');

        // print_r($this->request->getMethod());


        if ($this->request->getMethod() === 'POST') {
            $content = $this->request->getPost('content');
            $auction_date = $this->convert_Buddhist($this->request->getPost('datepicker'));
            $currentDateTime = date('Y-m-d H:i:s');
            $data = [
                'auction_name' => $this->request->getPost('topic'),
                'auction_code' => $this->request->getPost('code'),
                'auction_type' => $this->request->getPost('exampleSelect'),


                // 'type' => $this->request->getPost('exampleSelect'),


                'auction_date' => $auction_date,
                // 'details' => $this->request->getPost('details'),
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime,
                'auction_content' => $this->request->getPost('content'),
            ];

            $auctionId = $this->auctionModel->insertAuction($data);


            if ($auctionId) {
                // If insertion is successful, continue with the file saving logic
                $this->savefile($auctionId);
                return redirect()->to('/detail?status=success&message=Files%20uploaded%20successfully&auction_id=' . $auctionId);
            } else {

                // Handle insertion failure (optional)
                return redirect()->back()->with('error', 'Auction insertion failed');
            }

        } else {
            echo 0;
        }

    }

    public function showUploadDetails()
    {
        $status = $this->request->getGet('status'); // Get status from URL
        $message = $this->request->getGet('message'); // Get message from URL
        $auctionId = $this->request->getGet('auction_id'); // Get auction ID

        // Fetch auction details if auction_id exists
        $auctionData = null;
        if ($auctionId) {
            $auctionData = $this->auctionModel->getAuctionWithFiles($auctionId);
        }


        print_r($auctionData);
        // die();
        return view('auction_detail', [
            'status' => $status,
            'message' => urldecode($message), // Decode URL-encoded message
            'auctionData' => $auctionData
        ]);
    }




    private function savefile($auctionId)
    {
        // Example login controller code
        $userData = [
            'id' => 1,
            'username' => 'Krittawat',  // The username that you want to store in the session
            'isLoggedIn' => true,  // You can also store login status, etc.
        ];

        session()->set($userData);
        $username = session()->get('id');  // Get the username stored in the session

        // Validate form inputs
        $validation = \Config\Services::validation();
        $validation->setRules([
            'pdf_file' => 'permit_empty|mime_in[pdf_file,application/pdf]',
            'image_file' => 'permit_empty|max_size[image_file,2048]|mime_in[image_file,image/jpg,image/jpeg,image/png,image/gif]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Handle validation errors
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Handle PDF uploads
        $pdfFiles = $this->request->getFileMultiple('fileInput');
        $pdfFileOrder = json_decode($this->request->getVar('pdfFileOrder'));  // Get the order of PDF files from the form
        $pdfPaths = [];

        // Handle Image uploads
        $imageFiles = $this->request->getFileMultiple('imageInput');
        $imageFileOrder = json_decode($this->request->getVar('imageFileOrder'));  // Get the order of image files from the form
        $imagePaths = [];

        // Save PDF files in order
        if ($pdfFileOrder && count($pdfFileOrder) > 0) {
            foreach ($pdfFileOrder as $index => $fileName) {  // Loop with index for order
                foreach ($pdfFiles as $pdf) {
                    if ($pdf->getName() == $fileName) {
                        if ($pdf->isValid() && !$pdf->hasMoved()) {
                            $newName = $pdf->getName();
                            $pdf->move(WRITEPATH . 'uploads/pdfs', $newName);
                            $pdfPaths[] = $newName;

                            $data = [
                                'auction_FK_id' => $auctionId,
                                'file_name' => $newName,
                                'file_type' => $pdf->getName(),
                                'file_size' => $pdf->getSize(),
                                'file_path' => WRITEPATH . 'uploads/pdfs/' . $newName,
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                                'created_by' => $username,
                                'updated_by' => $username,
                                'status' => 'active',
                                'order' => $index + 1,  // Store the order in the database
                            ];
                            $this->fileModel->save($data);
                        }
                    }
                }
            }
        }

        // Save Image files in order
        if ($imageFileOrder && count($imageFileOrder) > 0) {
            foreach ($imageFileOrder as $index => $fileName) {  // Loop with index for order
                foreach ($imageFiles as $img) {
                    if ($img->getName() == $fileName) {
                        if ($img->isValid() && !$img->hasMoved()) {
                            $newName = $img->getName();
                            $img->move(WRITEPATH . 'uploads/images', $newName);
                            $imagePaths[] = $newName;

                            $data = [
                                'auction_FK_id' => $auctionId,
                                'file_name' => $newName,
                                'file_type' => $img->getClientMimeType(),
                                'file_size' => $img->getSize(),
                                'file_path' => WRITEPATH . 'uploads/pdfs/' . $newName,
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                                'created_by' => $username,
                                'updated_by' => $username,
                                'status' => 'active',
                                'order' => $index + 1,  // Store the order in the database
                            ];
                            $this->fileModel->save($data);
                        }
                    }
                }
            }
        }

        // Redirect with success message
        session()->setFlashdata('success', 'Files uploaded and saved successfully!');

    }

    private function convert_Buddhist($date)
    {
        // Parse the input date (assuming format is "dd/mm/yyyy")
        list($day, $month, $yearBE) = explode('/', $date);

        // Convert BE to AD
        $yearAD = $yearBE - 543;

        // Format as YYYY-MM-DD for strtotime()
        $dateString = "$yearAD-$month-$day";

        // Convert to datetime format (Y-m-d H:i:s)
        $datetime = date('Y-m-d H:i:s', strtotime($dateString));

        // Return the datetime result
        return $datetime;
    }
}