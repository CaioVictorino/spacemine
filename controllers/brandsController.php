<?php

namespace Controllers;

use Dflydev\DotAccessData\Data;
use Models\Brands;
use Tools\databaseTool;
use Tools\urlTool;
use PDOException;

class brandsController 
{

     public function __construct($method)
     {
          $this->$method();
     }

     public function index()
     {

          
          $sql = "SELECT * FROM brands";
          $database = new databaseTool;
          $db_init = $database->dbConnect();
          $db_query = $db_init->query($sql);
          $brands = $db_query->fetchAll();
          

          require VIEW.'admin/brands.php';
          return;
     }

     public function register()
     {

          $brand = new Brands;
          $execute = $brand->save($_POST);

          if ($execute == false){
               $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
               $status = "danger";
               $title = "Oops!";
               $message = "Ocorreu um erro ao cadastrar, cadastro já existente ou dados insuficientes.";
          } elseif ($execute == true) {
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "success";
               $title = "Sucesso!";
               $message = 'Equipamento cadastrado com sucesso';
          }

          $brands = new Brands;
          $brands = $brands->all();

          require VIEW.'admin/brands.php';
          return;
     }

     public function edit()
     {
          $id = $_GET['id'];

          $brand = new Brands;
          $brand = $brand->id($id);

          require VIEW.'admin/brands-edit.php';
          return;
     }

     public function update()
     {

          $brand = new Brands;
          $brand = $brand->update($_POST);

          if($brand == true){
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "success";
               $title = "Sucesso!";
               $message = 'Marca editada com sucesso';
          } elseif ($brand == false) {
               $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
               $status = "danger";
               $title = "Oops!";
               $message = "Ocorreu um erro ao editar";
          }

          $brand = new Brands;
          $brands = $brand->all();

          require VIEW . 'admin/brands.php';
          return;

     }


     public function delete()
     {

          $getBrand = new Brands;
          $getBrand = $getBrand->id($_GET['id']);

          $brand = new Brands;
          $brand = $brand->delete($_GET['id']);

          if($brand == true){
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "warning";
               $title = "Sucesso!";
               $message = "Marca <b>".$getBrand['title']."</b> deletada com sucesso";
          } elseif ($brand == false) {
               $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
               $status = "danger";
               $title = "Oops!";
               $message = "Ocorreu um erro ao deletar ";
          }

          $brand = new Brands;
          $brands = $brand->all();

          require VIEW.'admin/brands.php';
          return;
     }

}