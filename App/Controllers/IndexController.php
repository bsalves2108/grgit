<?php

namespace App\Controllers;

use App\Auth;
use App\Models\User;
use App\Traits\validate;
use grgit\Lib\Controller;

class IndexController extends Controller
{
    use validate;

    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public  function index()
    {
        $this->view('login');
    }

    public function logout()
    {
        Auth::logout();
        header('Location: /home');
    }

    public function login($request)
    {
        $user = $this->user->getUserByEmail($request['email']);
        if($user) {
            if(password_verify($request['password'], $user['password'])) {
                Auth::make($user);
                return http_response_code(200);
            } else {
                return http_response_code(401);
            }
        } else {
            return http_response_code(403);
        }
    }

    public function signup()
    {
        $this->view('signup');
    }

    public function new($request)
    {
        if (
            validate::required($request['name'])  &&
            validate::required($request['email']) &&
            validate::required($request['password']) &&
            validate::required($request['phone']) && validate::min($request['phone'], 14)
        ) {
            $request['password'] = password_hash($request['password'], PASSWORD_BCRYPT);
            if ($this->user->save($request)) {
                http_response_code(201);
            } else {
                http_response_code(406);
            }
        } else {
            http_response_code(400);
        }
    }

}