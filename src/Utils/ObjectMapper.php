<?php
namespace App\Utils;

class ObjectMapper {

  public static function mapObjectToEntity($data,$entityName,$nameSpace) {
    if(empty($data) || empty($entityName)) return "invalid entity or data";
    $post = json_decode($data);
    if (json_last_error() !== JSON_ERROR_NONE) return "invalid json";
    $fields = get_object_vars($post);// php reflection
    $nameSpace .= $entityName;
    $Entity = new $nameSpace();
    if(!$Entity ) return "error in entity object";

    foreach($fields as $name => $value ) {
      try {
        $reflectionMethod = new \ReflectionMethod($nameSpace, 'set'.$name);
        $reflectionMethod->invoke($Entity, $value);
      } catch (Exception $e) {
       return $name.' field not found in entity object';
      }
    }
    return $Entity;
  }


}
