<?php

function prettyArray($array) {
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

function abort($statusCode = 404) {
  http_response_code($statusCode);
  require_once 'views/' . $statusCode . '.php';
  die();
}