<?php

class Model 
{
  public function initObjectFromArray($array) 
  {
    foreach ($array as $key => $value) {
      $property = $this->snakeToCamel($key);
      if (property_exists($this, $property)) {
        $this->$property = $value;
      }
    }
  }

  public function setObjectToSession($name)
  {
    foreach ($this as $property => $value) {
      $key = $this->camelToSnake($property);
      $_SESSION[$name][$key] = $value;
    }
  }

  public function snakeToCamel($string)
  {
    $string = ucwords($string, "_");
    $string = lcfirst($string);
    $string = str_replace("_", "", $string);
    return $string;
  }
  
  public function camelToSnake($string)
  {
    $string = preg_replace('/[A-Z]/', '_$0', $string);
    $string = strtolower($string);
    return $string;
  }

}
