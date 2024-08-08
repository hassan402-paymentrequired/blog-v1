<?php
//require_once 'config/functions.php';
//require base_path('vendor/
require "../config/functions.php";
require '../vendor/autoload.php';

use App\Controller\Auth\RegisterUserController;
use App\Routes;

$routes = new Routes();

$routes->get('/', [RegisterUserController::class, 'index']);
$routes->post('/register', [RegisterUserController::class, 'store']);

$routes->get('/login', [\App\Controller\Auth\AuthenticateUserController::class, 'index']);
$routes->post('/login', [\App\Controller\Auth\AuthenticateUserController::class, 'store']);
$routes->post('/logout', [\App\Controller\Auth\AuthenticateUserController::class, 'destroy']);

$routes->post('/comment/delete', [\App\Controller\Comments\CommentController::class, 'destroy']);

$routes->get('/home/feed', [\App\Controller\Feeds\FeedsController::class, 'index']);
$routes->get('/home/feed/create', [\App\Controller\Feeds\FeedsController::class, 'index']);
$routes->post('/home/feed/create', [\App\Controller\Posts\BlogPostsController::class, 'store']);


$routes->post('/home/comment/create', [\App\Controller\Comments\CommentController::class, 'store']);

$routes->get('/profile', [\App\Controller\Profile\UserProfile::class, 'index']);
$routes->get('/profile/update', [\App\Controller\Profile\UserProfile::class, 'edit']);
$routes->post('/profile/update', [\App\Controller\Profile\UserProfile::class, 'update']);


$routes->get('/home/feed/show', [\App\Controller\Posts\BlogPostsController::class, 'show']);
$routes->post('/comment', [\App\Controller\Posts\BlogPostsController::class, 'index']);

$routes->resolve();