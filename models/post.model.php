<?php
require_once __DIR__ . '/../Database.php';

class PostModel extends Database {
  private $config;
  private $connection;
  public function __construct() {
    $this->config = require_once __DIR__ . '/../config.php';

    $this->connection = $this->connect($this->config['database'], $this->config['user'], $this->config['password']);
  }
  
  public function posts() {
    $query = "select * from posts";
  
    $statement = $this->connection->prepare($query);

    $statement->execute();

    $posts = $statement->fetchAll();

    return $posts;

  }

  public function getPostsByUserID($id) {
    $query = "select * from posts where user_id = {$id}";
    
    $statement = $this->connection->prepare($query);
    $statement->execute();

    $posts = $statement->fetchAll();

    return $posts;
  }
}