<?php

namespace Controllers;

class homeController{
     public function __construct($method)
     {
          $this->$method();
          return;
     }

     public function index()
     {
          require __DIR__.'/../views/home.php';
          return;
     }
}