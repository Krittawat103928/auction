<?php

namespace App\Controllers;

use App\Models\FileModel;
use CodeIgniter\Files\File;

class FileUploadController extends BaseController
{
    public function index()
    {
        return view('file_upload_form2');
    }

    public function uploadFiles()
    {
        // Validate form inputs
        $validation = \Config\Services::validation();
        $validation->setRules([
            'pdf_file' => 'permit_empty|mime_in[pdf_file,application/pdf]',
            'image_file' => 'permit_empty|max_size[image_file,2048]|mime_in[image_file,image/jpg,image/jpeg,image/png,image/gif]',
            // 'title' => 'required|min_length[3]',
            // 'date' => 'required|valid_date'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // return redirect()->back()->withInput()->with('errors', $validation->getErrors());

            var_dump($validation->getErrors());
        }

        // Handle PDF uploads
        $pdfFiles = $this->request->getFileMultiple('fileInput');
        $pdfPaths = [];


        foreach ($pdfFiles as $pdf) {
            if ($pdf->isValid() && !$pdf->hasMoved()) {


                print_r($pdf);
                print_r(WRITEPATH);
                $newName = $pdf->getRandomName();
                $pdf->move(WRITEPATH . 'uploads/pdfs', $newName);
                $pdfPaths[] = $newName;


            }
        }

        // Handle Image uploads
        $imageFiles = $this->request->getFileMultiple('imageInput');
        $imagePaths = [];
        foreach ($imageFiles as $img) {
            if ($img->isValid() && !$img->hasMoved()) {
                $newName = $img->getRandomName();
                $img->move(WRITEPATH . 'uploads/images', $newName);
                $imagePaths[] = $newName;
            }
        }

        // Get other form data
        $data = [
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('exampleSelect'),
            'date' => $this->request->getPost('datepicker'),
            'description' => $this->request->getPost('description'),
            'pdf_files' => $pdfPaths,
            'image_files' => $imagePaths
        ];

        // Here you would typically save to database
        $yourModel->save($data);
      
  
        // return redirect()->to('/upload')->with('success', 'Files uploaded successfully');
    }
}
