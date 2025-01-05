<?php 

class PostController {
  public $postModel;

  public function __construct(){
    require_once __DIR__ . '/../models/post.model.php';
    $this->postModel = new PostModel();
  }

  public function showPosts() {
   $posts =  $this->postModel->posts();
   include_once __DIR__ . '/../views/index.view.php';
  }

  public function showPostByUserID($id) {
    $posts = $this->postModel->getPostsByUserID($id);
    include_once __DIR__ . '/../views/index.view.php';
  }
} 