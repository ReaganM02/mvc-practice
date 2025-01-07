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

function loadFile($path) {
  return require_once BASE_PATH . $path;
}

function loadView($viewPath, $data=[]) {
  extract($data);
  return require_once BASE_PATH . '/views/' . $viewPath;
}

function loadModel($modelFile) {
  return require_once BASE_PATH . '/models/' . $modelFile;
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