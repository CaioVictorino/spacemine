<?php

namespace Controllers;

use Tools\databaseTool;
use PDOException;

class pagesController{
     public function __construct($method)
     {
          $this->$method();
          return;
     }

     public function index()
     {
          $database = new databaseTool;
          $sql = "SELECT * FROM pages";
          $dbconn = $database->dbConnect();
          $query = $dbconn->query($sql);
          $pages = $query->fetchAll();

          $database = new databaseTool;
          $sql = "SELECT * FROM categories WHERE `type` = 'pages'";
          $dbconn = $database->dbConnect();
          $query = $dbconn->query($sql);
          $categories = $query->fetchAll();

          require VIEW.'admin/pages.php';
          return;
     }

     
}