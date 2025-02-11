<?php

namespace App\Models;

use CodeIgniter\Model;

class AuctionModel extends Model
{
    protected $table = 'auctions'; // Your database table name
    protected $primaryKey = 'id'; // Primary key column

    protected $allowedFields = ['auction_code', 'auction_name', 'auction_price', 'auction_date', 'created_at']; // Allowed columns to insert/update

    // Optional: Define timestamps if you have created_at & updated_at columns
    // protected $useTimestamps = true;
    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';

    public function getAuctions()
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
