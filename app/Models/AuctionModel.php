<?php

namespace App\Models;

use CodeIgniter\Model;

class AuctionModel extends Model
{
    protected $table = 'auctions'; // Your database table name
    protected $primaryKey = 'id'; // Primary key column

    protected $allowedFields = [
        'auction_code',
        'auction_name',
        'auction_type',
        'auction_price',
        'auction_date',
        'created_at',
        'updated_at',
        'auction_content'
    ]; // Allowed columns to insert/update

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
        return $this->find(id: $id);
    }

    public function insertAuction($data)
    {
        $this->insert($data);
        return $this->insertID(); // Returns the last inserted ID
    }



    public function updateAuction($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteAuction($id)
    {
        return $this->delete($id);
    }

    public function getAuctionWithFiles($auctionId = null)
    {
        // Use Query Builder to perform a JOIN query
        $builder = $this->builder();

        // Select auction fields along with auction_files fields
        $builder->select('*');

        // Join auction_files table on auction id
        $builder->join('uploaded_files', 'auctions.id = uploaded_files.auction_FK_id');

        // If auctionId is provided, filter by that auctionId
        if ($auctionId !== null) {
            $builder->where('auctions.id', $auctionId);
        }

        // Filter for only active auction files
        $builder->where('uploaded_files.status', 'active');

        // Execute the query and return the results
        return $builder->get()->getResultArray();

    }





}
