<?php

namespace App\Controllers;

use App\Middlewares\Auth;
use App\Models\Contact;
use App\Traits\validate;
use grgit\Lib\Controller;

class ContactController extends Controller
{

    use validate;

    private $contact;

    public function __construct()
    {
        if(!Auth::isAuth()) {
            http_response_code(401);
            die('unauthorized request');
        }
        $this->contact = new Contact();
    }

    public function index()
    {
        $this->view("Contact/list", ['contacts' => $this->contact->fetchAllAuthorized()]);
    }

    public function getContact($request)
    {
        if(!Auth::validRequest()) {
            http_response_code(400);
            die;
        }
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode((new Contact())->find($request['id']));

    }

    public function formNew()
    {
        $this->view("Contact/new");
    }

    public function formEdit($request)
    {
        $contact = $this->contact->find($request['id']);
        if($contact) {
            $this->view("Contact/edit", ['contact' => $this->contact->find($request['id'])]);
        } else {
            http_response_code(404);
        }
    }

    public function new($request)
    {
        if (!Auth::validRequest()) {
            http_response_code(400);
            die;
        }
        if (
            validate::required($request['name'])  &&
            validate::required($request['email']) &&
            validate::required($request['phone']) && validate::min($request['phone'], 14)
        ) {
            $request['id_user'] = $_SESSION['user']['id'];
            if ($this->contact->save($request)){
                http_response_code(201);
            } else {
                http_response_code(406);
            }
        } else {
            http_response_code(400);
        }

    }

    public function edit($request)
    {
        if (!Auth::validRequest()) {
            http_response_code(400);
            die;
        }
        if (
            validate::required($request['name'])  &&
            validate::required($request['email']) &&
            validate::required($request['phone']) && validate::min($request['phone'], 14)
        ) {
            $request['id_user'] = $_SESSION['user']['id'];
            if ($this->contact->edit($request)) {
                http_response_code(201);
            } else {
                http_response_code(406);
            }
        } else {
            http_response_code(400);
        }
    }

    public function remove($request)
    {
        if(!Auth::validRequest()) {
            http_response_code(400);
            die;
        }
        if($this->contact->remove($request['id'])){
            http_response_code(200);
        } else {
            http_response_code(406);
        }
    }

}