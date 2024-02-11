<?php
namespace Tools;
use PDO;

class databaseTool{
     private $dsn = 'mysql:dbname=pdealer;host=127.0.0.1';
     private $username = 'root';
     private $password = '@Caio240894';

     public function dbConnect()
     {
          $db = new PDO($this->dsn, $this->username, $this->password);
          return $db;
     }
}