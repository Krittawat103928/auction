<?php

namespace App\Controllers;

use App\Models\AuctionModel;

use App\Models\UserModel;

class Login extends BaseController
{
    protected $auctionModel;

    public function __construct()
    {
        // Load model
        $this->auctionModel = new AuctionModel();
    }
    public function index(): string
    {

        return view('login_view');
    }
    public function login()
    {
        $db = \Config\Database::connect('secondDB'); // Connect to WordPress DB
        $session = session();

        echo $username = $this->request->getPost('username');
        echo $password = $this->request->getPost('password');
        echo '<br>';
        // Fetch user from WordPress database
        $query = $db->query("SELECT * FROM wp_users WHERE user_login = ?", [$username]);
        $user = $query->getRow();

        print_r($user->user_pass);


        if (!$user) {
            return "Invalid username or password.";
        }

        // Verify password using WordPress hash
        if (!password_verify($password, $user->user_pass)) {
            return "Invalid username or password.";
        }

        // Store session
        $session->set([
            'user_id' => $user->ID,
            'username' => $user->user_login,
            'logged_in' => true
        ]);

        // return redirect()->to('/dashboard');
    }

    public function dashboard()
    {
        echo 1;
    }

}
