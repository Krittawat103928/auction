<?php

namespace App\Controllers;

use App\Models\FileModel;
use CodeIgniter\Controller;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('file_upload_form');
    }

    public function upload()
    {
        $file = $this->request->getFile('file');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/', $newName);

            $fileModel = new FileModel();
            $fileModel->insertFile([
                'file_name' => $file->getClientName(),
                'file_path' => 'uploads/' . $newName,
            ]);
            echo 1;
            return redirect()->to('/')->with('message', 'Upload successful');
        }
        echo 0;
        return redirect()->to('/')->with('error', 'Upload failed');
    }
}
