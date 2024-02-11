<?php

namespace Controllers;

use Dflydev\DotAccessData\Data;
use Models\Brands;
use Models\Equipments;
use Tools\databaseTool;
use Tools\urlTool;
use PDOException;

class equipmentsController 
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
          $equipments = $db_query->fetchAll();
          
          require VIEW.'admin/equipments.php';
          return;
     }

     public function register()
     {
          $equipments = new Equipments;
          $equipments = $equipments->save($_POST);

          if($equipments == true){
               
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "success";
               $title = "Sucesso!";
               $message = 'Marca cadastrada com sucesso';
          } elseif ($equipments == false){
               $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
               $status = "danger";
               $title = "Oops!";
               $message = "Ocorreu um erro ao cadastrar. Dados insuficientes ou equipamento já cadastrado.";
          }


          $equipments = new Equipments;
          $equipments = $equipments->all();

          require VIEW.'admin/equipments.php';
          return;
     }

     public function edit()
     {
          $id = $_GET['id'];

          
          $consult = new Equipments;
          $brand = $consult->id($id);

          require VIEW.'admin/equipments-edit.php';
          return;
     }

     public function update()
     {
          $equipments = new Equipments;
          $equipments = $equipments->update($_POST);

          if($equipments == true){
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "success";
               $title = "Sucesso!";
               $message = 'Equipamento editado com sucesso';
          } elseif ($equipments == false){
               $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
               $status = "danger";
               $title = "Oops!";
               $message = "Ocorreu um erro ao editar";
          }

          $equipments = new Equipments;
          $equipments = $equipments->all();

          require VIEW . 'admin/equipments.php';
          return;

     }


     public function delete()
     {
          $id = $_GET['id'];
          $getEquipment = new Equipments;
          $getEquipment = $getEquipment->id($id);

          $equipments = new Equipments;
          $equipments = $equipments->delete($id);

          if($equipments == true){
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "warning";
               $title = "Sucesso!";
               $message = "Equipamento <b>".$getEquipment['title']."</b> deletado com sucesso";
          } elseif ($equipments == false){
               $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
               $status = "danger";
               $title = "Oops!";
               $message = "Ocorreu um erro ao deletar o equipamento";
          }

          $equipments = new Equipments;
          $equipments = $equipments->all();

          require VIEW.'admin/equipments.php';
          return;
     }

}