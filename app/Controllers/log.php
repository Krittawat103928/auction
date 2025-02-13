<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;

class LogController extends Controller
{
    public function logVisitor()
    {
        // ดึงข้อมูลการเข้าชม
        $ipAddress = $this->request->getServer('REMOTE_ADDR'); // IP Address
        $pageUrl = current_url(); // URL ของหน้าเว็บที่ถูกเข้าชม
        $timestamp = date("Y-m-d H:i:s"); // เวลาปัจจุบัน

        // สร้างข้อความ log
        $logMessage = "IP: $ipAddress - Page: $pageUrl - Time: $timestamp\n";

        // เขียน log ลงไฟล์
        $logFile = WRITEPATH . 'logs/visitor_log.txt';
        file_put_contents($logFile, $logMessage, FILE_APPEND);

        // ทำให้ผู้ใช้สามารถเห็นการบันทึกในหน้าเว็บ (Optional)
        echo "Visitor log has been saved.";
    }
}
