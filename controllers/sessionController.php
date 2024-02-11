<?php

namespace Controllers;

class sessioController{
     public function __construct($method)
     {
          $this->$method();
          return;
     }

     public function login()
     {
          require __DIR__.'/../views/home.php';
          die; 
     }

     public function logout()
     {
          require __DIR__.'/../views/home.php';
          die; 
     }
}