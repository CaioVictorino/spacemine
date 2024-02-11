<?php
namespace Tools;
use PDO;

class urlTool{
     static public function redirect($route){

        $root = $_SERVER['SERVER_NAME'];
        $uri = $root."/".$route;

        header("Location: $route");
        return;
     }
}