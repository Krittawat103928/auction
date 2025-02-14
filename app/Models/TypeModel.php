<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeModel extends Model
{
    protected $table = 'typeauction'; // Your database table name
    protected $primaryKey = 'id'; // Primary key column

    protected $allowedFields = [
        'type_code',
        'type_name',
        'type_status',
        'type_date',
        // 'created_at',D
        // 'auction_content'
    ]; // Allowed columns to insert/update


    public function getType()
    {
        return $this->findAll();
    }

    public function getAuction($id)
    {
        return $this->find($id);
    }

    public function insertAuction($data)
    {
        return $this->insert($data);
    }

    public function updateAuction($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteAuction($id)
    {
        return $this->delete($id);
    }

    // Add more custom functions here...




}
