<?php

$request = parse_url($_SERVER['REQUEST_URI'])['path'];


switch($request) {
  case '/' :
    require_once 'controllers/post.controller.php';
    $controller = new PostController();
    $controller->showPostByUserID(4);
    break; 
  default: 
    http_response_code(404);
    echo 'Not found.';
}