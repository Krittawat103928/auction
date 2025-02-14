<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup = 'secondDB';  // Specify the secondary database

    protected $table = 'wp_users';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['user_login', 'user_pass', 'user_email', 'user_registered'];

    public function getUserByUsername($username)
    {
        return $this->where('user_login', $username)->first();
    }
}
