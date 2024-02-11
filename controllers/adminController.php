<?php

namespace Controllers;

class adminController{
     public function __construct($method)
     {
          $this->$method();
          return;
     }

     public function index()
     {    
          require __DIR__.'/../views/admin/dashboard.php';
          die; 
     }
}