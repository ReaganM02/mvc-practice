<?php

class Validator {
    public static function string($value) {
      return strlen(trim($value)) === 0;
    }

    public static function max($value, $max = INF) {
      return strlen(trim($value)) >= $max;
    }
}