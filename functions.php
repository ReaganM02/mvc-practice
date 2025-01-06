<?php

function prettyArray($array) {
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

function abort($statusCode = Response::NOT_FOUND) {
  http_response_code($statusCode);
  require_once 'views/' . $statusCode . '.php';
  die();
}

/**
 * Use to load a view file
 * @param string $path - file path
 * @return void
 */
function loadTemplate($path, $data=[]) {
  extract($data);
  require_once __DIR__ . $path;
}

function fieldErrorClass($fieldName, $classes=[]) {
  if(empty($fieldName)) {
    return implode($classes);
  }
  return '';
}

function fieldErrorMsg($fieldName) {
  if(empty($fieldName)) {
    return $fieldName;
  }
  return '';
} 