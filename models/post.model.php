<?php
require_once __DIR__ . '/../Database.php';

class PostModel extends Database {
  private $config;
  private $connection;
  public function __construct() {
    $this->config = require_once __DIR__ . '/../config.php';

    $this->connection = $this->connect($this->config['database'], $this->config['user'], $this->config['password']);
  }

  public function createPost($title, $body, $userID) {
    $title = $_POST['post-title'];
    $statement = $this->connection->prepare('INSERT INTO posts(title, user_id, content) VALUES(:title, :user_id, :content)');
    $statement->bindValue(':title', $title, PDO::PARAM_STR);
    $statement->bindValue(':content', $body, PDO::PARAM_STR);
    $statement->bindValue(':user_id', $userID, PDO::PARAM_INT);

    if($statement->execute()) {
      return true;
    }
    return false;
  }
  
  public function posts() {
    $query = "select * from posts";
  
    $statement = $this->connection->prepare($query);

    $statement->execute();

    $posts = $statement->fetchAll();

    return $posts;

  }

  public function getPostsByUserID($id) {
    
    $statement = $this->connection->prepare("select * from posts where user_id = :id");

    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    $statement->execute();

    $posts = $statement->fetchAll();

    return $posts;
  }

  public function getPost($id) {

    $statement = $this->connection->prepare("select * from posts where id = :id");

    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    $statement->execute();

    $post = $statement->fetch();

    return $post;
  }

  /**
   * Get post by user ID
   * @param int $postID
   * @param int $userID
   * @return array {title: string, id: int, user_id: int}|false The post data or false if not found.
   */
  public function getPostByUserID($postID, $userID) {
    $statement = $this->connection->prepare("select * from posts where id = :id and user_id = :userID");

    $statement->bindValue(':id', $postID, PDO::PARAM_INT);
    $statement->bindValue(':userID', $userID, PDO::PARAM_INT);

    $statement->execute();

    $post = $statement->fetch();

    if(!$post) {
      return false;
    }
    return $post;
  }
}