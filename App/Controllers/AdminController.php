<?php

namespace App\Controllers;

use App\Middlewares\Auth;
use App\Models\Contact;
use App\Models\User;
use grgit\Lib\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        if(!Auth::isAuth() || !Auth::isAdmin()) {
            http_response_code(401);
            die('unauthorized request');
        }
        $this->template = 'admin';
    }

    public function index()
    {
        $user = new User();
        $users    = $user->fetchAll();
        $contacts = (new Contact())->fetchAll();
        $topUser  = $user->getTopContact();
        $lessUser  = $user->getLessContact();
        $this->view('Admin/dashboard', ['users' => $users, 'contacts' => $contacts, 'topUser' => $topUser, 'lessUser' => $lessUser]);
    }

    public function getData()
    {
        $user = new User();
        $months = $user->getContactsPerMonth();
        $users = $user->getUsersPerMonth();
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode(['cpm' => $months, 'upm' => $users]);
    }

}