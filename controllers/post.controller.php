<?php 

class PostController {
  public $postModel;

  public function __construct(){

    require_once __DIR__ . '/../Validator.php';

    require_once __DIR__ . '/../models/post.model.php';
    $this->postModel = new PostModel();
  }

  public function showPosts() {
   $posts =  $this->postModel->posts();
   loadTemplate('/views/posts/index.view.php', ['posts' => $posts]);
  }

  public function showPostByUserID($id) {
    $posts = $this->postModel->getPostsByUserID($id);
    loadTemplate('/views/posts/index.view.php', ['posts' => $posts]);
  }

  public function showPost($id) {
    $userID = 4;
    $post = $this->postModel->getPostByUserID($id, $userID);

    if(!$post) {
      abort(Response::NOT_FOUND);
    }

    loadTemplate('/views/posts/single.php', ['post' => $post]);
    
  }

  public function addPost() {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

      $errors = [];

      if(Validator::string($_POST['post-title'])) {
        $errors['post-title'] = 'Post title is required.';
      }

      if(Validator::string($_POST['post-body'])) {
        $errors['post-body'] = 'Post body is required.';
      }

      if(Validator::max($_POST['post-title'], 50)) {
        $errors['post-title'] = 'Title must be less than 10 characters.';
      }

      if(Validator::max($_POST['post-body'], 300)) {
        $errors['post-body'] = 'Body content must be less than 300 characters.';
      }


      if(empty($errors)) {
        $save = $this->postModel->createPost($_POST['post-title'], $_POST['post-body'], 4);
        if($save) {
          header('Location: /');
        }
      }
    
      loadTemplate('/views/posts/create.view.php', ['errors' => $errors]);

    }else {
      loadTemplate('/views/posts/create.view.php');
    }
    
  }
} 