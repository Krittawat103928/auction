<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
    protected $table = 'files'; // ชื่อตาราง
    protected $primaryKey = 'id';
    protected $allowedFields = ['filename', 'file_path', 'updated_at'];

    public function insertFile($data)
    {
        return $this->insert($data);
    }
}
