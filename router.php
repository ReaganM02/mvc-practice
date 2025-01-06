<?php

$request = parse_url($_SERVER['REQUEST_URI'])['path'];


switch($request) {
  case '/' :
    require_once 'controllers/post.controller.php';

    $controller = new PostController();
    
    $controller->showPostByUserID(4);

    break; 
  case '/post': 

    require_once 'controllers/post.controller.php';

    $controller = new PostController;

    $controller->showPost($_GET['id']);
    break;

  case '/post/create': 
    require_once 'controllers/post.controller.php';
    $controller = new PostController;
    $controller->addPost();
    break;
  default: 
    http_response_code(404);
    echo 'Not found.';
}