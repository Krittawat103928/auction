<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
    protected $table = 'uploaded_files'; // Name of your table
    protected $primaryKey = 'id'; // The primary key of your table

    // Allowable fields for mass assignment
    protected $allowedFields = [
        'auction_FK_id',
        'file_name',
        'file_type',
        'file_path',
        'file_size',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
        'order'
    ];

    // Enabling timestamps to manage created_at, updated_at automatically
    protected $useTimestamps = false; // If you are manually managing timestamps
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';

    // Validation rules
    // protected $validationRules = [
    //     'title' => 'required|min_length[3]',
    //     'category' => 'required',
    //     'date' => 'required|valid_date',
    //     'description' => 'permit_empty',
    // ];

    // Optional: you could create relationships if needed
}
