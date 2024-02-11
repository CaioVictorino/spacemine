<?php

namespace Controllers;

use Models\Services;
use Tools\databaseTool;
use Tools\urlTool;
use PDOException;

class servicesController 
{

     
     public function __construct($method)
     {
          $this->$method();
     }

     public function index()
     {

          
          $sql = "SELECT * FROM equipments";
          $database = new databaseTool;
          $db_init = $database->dbConnect();
          $db_query = $db_init->query($sql);
          $services = $db_query->fetchAll();
          
          require VIEW.'admin/equipments.php';
          return;
     }

     public function register()
     {
          $services = new Services;
          $services = $services->save($_POST);

          if($services == true){
               
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "success";
               $title = "Sucesso!";
               $message = 'Marca cadastrada com sucesso';
          } elseif ($services == false){
               $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
               $status = "danger";
               $title = "Oops!";
               $message = "Ocorreu um erro ao cadastrar. Dados insuficientes ou equipamento já cadastrado.";
          }


          $services = new Services;
          $services = $services->all();

          require VIEW.'admin/equipments.php';
          return;
     }

     public function edit()
     {
          $id = $_GET['id'];

          
          $consult = new Services;
          $brand = $consult->id($id);

          require VIEW.'admin/equipments-edit.php';
          return;
     }

     public function update()
     {
          $services = new Services;
          $services = $services->update($_POST);

          if($services == true){
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "success";
               $title = "Sucesso!";
               $message = 'Equipamento editado com sucesso';
          } elseif ($services == false){
               $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
               $status = "danger";
               $title = "Oops!";
               $message = "Ocorreu um erro ao editar";
          }

          $services = new Services;
          $services = $services->all();

          require VIEW . 'admin/equipments.php';
          return;

     }


     public function delete()
     {
          $id = $_GET['id'];
          $getEquipment = new Services;
          $getEquipment = $getEquipment->id($id);

          $services = new Services;
          $services = $services->delete($id);

          if($services == true){
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "warning";
               $title = "Sucesso!";
               $message = "Equipamento <b>".$getEquipment['title']."</b> deletado com sucesso";
          } elseif ($services == false){
               $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
               $status = "danger";
               $title = "Oops!";
               $message = "Ocorreu um erro ao deletar o equipamento";
          }

          $services = new Services;
          $services = $services->all();

          require VIEW.'admin/equipments.php';
          return;
     }

}