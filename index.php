<?php
ob_start('ob_gzhandler');

session_start();

require __DIR__.'/vendor/autoload.php';

$app = new App\App;
$app->get('/', 'IndexController@index');
$app->get('/home', 'IndexController@index');
$app->get('/logout', 'IndexController@logout');
$app->get('/signup', 'IndexController@signup');
$app->get('/contacts', 'ContactController@index');
$app->get('/contacts/new', 'ContactController@formNew');
$app->get('/contacts/{id}', 'ContactController@getContact');
$app->get('/contacts/edit/{id}', 'ContactController@formEdit');
$app->get('/contacts/remove/{id}', 'ContactController@remove');

$app->post('/login', 'IndexController@login');
$app->post('/signup', 'IndexController@new');
$app->post('/contacts/new', 'ContactController@new');
$app->post('/contacts/edit', 'ContactController@edit');


$app->get('/dashboard', 'AdminController@index');
$app->get('/dashboard/getData', 'AdminController@getData');


$app->run();