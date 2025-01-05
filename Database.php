<?php

class Database {
  protected function connect($config, $username, $password) {
    $dsn = 'mysql:' . http_build_query($config, '', ';');
    $connection = new PDO($dsn, $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    return $connection;
  }
}