<?php

namespace App\Controllers;

use App\Models\AuctionModel;

class UploadController extends BaseController
{

    public function uploadFile()
    {
        $files = $this->request->getFiles();
        foreach ($files['fileInput'] as $file) {
            // ตรวจสอบและอัพโหลดไฟล์
            if ($file->isValid() && !$file->hasMoved()) {
                $newFileName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $newFileName);
            }
        }

    }

}
