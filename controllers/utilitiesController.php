<?php

namespace Controllers;

use Dflydev\DotAccessData\Data;
use Tools\databaseTool;
use Tools\urlTool;
use PDOException;

class utilitiesController 
{

     public function __construct($method)
     {
          $this->$method();
     }

     public function index()
     {

          
          $sql = "SELECT * FROM utilities";
          $database = new databaseTool;
          $db_init = $database->dbConnect();
          $db_query = $db_init->query($sql);
          $utilities = $db_query->fetchAll();

          $sql = "SELECT * FROM categories WHERE `type` = 'utilities'";
          $database = new databaseTool;
          $db_init = $database->dbConnect();
          $db_query = $db_init->query($sql);
          $categories = $db_query->fetchAll();
          

          require VIEW.'admin/utilities.php';
          return;
     }

     public function register()
     {
          $dbconn = new databaseTool;
          $sql = "INSERT INTO utilities (`title`, `description`, `url`, `category`) VALUES (:title, :description, :url, :category)";
          $database = $dbconn->dbConnect();
          $sql = $database->prepare($sql);
          $sql->bindValue("title", $_POST['title']);
          $sql->bindValue("description", $_POST['description']);
          $sql->bindValue("url", $_POST['url']);
          $sql->bindValue("category", $_POST['category']);

          try{
               $sql->execute();
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "success";
               $title = "Sucesso!";
               $message = 'Utilidade cadastrada com sucesso';
          } catch (PDOException $e){
               $eCode = $e->getCode();
               switch ($eCode){
                    case '23000':
                         $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
                         $status = "danger";
                         $title = "Oops!";
                         $message = 'Utilidade já possuí registro.';
                         break;
                    default:
                         $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
                         $status = "danger";
                         $title = "Oops!";
                         $message = "Ocorreu um erro: ".$e->getMessage();
                         break;
                    
               }
          }


          $sql = "SELECT * FROM utilities";
          $database = new databaseTool;
          $db_init = $database->dbConnect();
          $db_query = $db_init->query($sql);
          $utilities = $db_query->fetchAll();

          $sql = "SELECT * FROM categories WHERE `type` = 'utilities'";
          $database = new databaseTool;
          $db_init = $database->dbConnect();
          $db_query = $db_init->query($sql);
          $categories = $db_query->fetchAll();

          require VIEW.'admin/utilities.php';
          return;
     }

     public function edit()
     {
          $id = $_GET['id'];

          $dbconn = new databaseTool;
          $sql = "SELECT * FROM utilities WHERE id = $id";
          $database = $dbconn->dbConnect();
          $sql = $database->query($sql);
          $utilitie = $sql->fetch();

          $dbconn = new databaseTool;
          $sql = "SELECT * FROM categories WHERE `type` = 'utilities'";
          $database = $dbconn->dbConnect();
          $sql = $database->query($sql);
          $categories = $sql->fetchAll();

          require VIEW.'admin/utilities-edit.php';
          return;
     }

     public function update()
     {
          $id = $_POST['id'];

          $dbconn = new databaseTool;
          $sql = "UPDATE utilities SET `title` = :title, `description` = :description, `url` = :url, `category` = :category WHERE id = $id";
          $database = $dbconn->dbConnect();
          $sql = $database->prepare($sql);
          $sql->bindValue("title", $_POST['title']);
          $sql->bindValue("description", $_POST['description']);
          $sql->bindValue("url", $_POST['url']);
          $sql->bindValue("category", $_POST['category']);

          try{
               $sql->execute();
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "success";
               $title = "Sucesso!";
               $message = 'Utilidade editada com sucesso';
          } catch (PDOException $e){
               $eCode = $e->getCode();
               switch ($eCode){
                    case '23000':
                         $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
                         $status = "danger";
                         $title = "Oops!";
                         $message = 'Utilidade já possuí registro.';
                         break;
                    default:
                         $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
                         $status = "danger";
                         $title = "Oops!";
                         $message = "Ocorreu um erro: ".$e->getMessage();
                         break;
                    
               }
          }


          $sql = "SELECT * FROM utilities";
          $database = new databaseTool;
          $db_init = $database->dbConnect();
          $db_query = $db_init->query($sql);
          $utilities = $db_query->fetchAll();

          $sql = "SELECT * FROM categories WHERE `type` = 'utilities'";
          $database = new databaseTool;
          $db_init = $database->dbConnect();
          $db_query = $db_init->query($sql);
          $categories = $db_query->fetchAll();

          require VIEW.'admin/utilities.php';
          return;
     }


     public function delete()
     {
          $id = $_GET['id'];
          $database = new databaseTool;
          $sql = "SELECT * FROM utilities WHERE id = $id";
          $dbconn = $database->dbConnect();
          $query = $dbconn->query($sql);
          $utilitiesGet = $query->fetch();

          $database = new databaseTool;
          $sql = "DELETE FROM utilities WHERE id = $id";
          $dbconn = $database->dbConnect();
          
          try{
               $query = $dbconn->query($sql);
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "warning";
               $title = "Sucesso!";
               $message = "Utilidade <b>".$utilitiesGet['title']."</b> deletada com sucesso";
          } catch (PDOException $e){
               $eCode = $e->getCode();
               switch ($eCode){
                    default:
                         $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
                         $status = "danger";
                         $title = "Oops!";
                         $message = "Ocorreu um erro: ".$e->getMessage();
                         break;
               }
          }

          $dbconn = new databaseTool;
          $sql = "SELECT * FROM utilities";
          $database = $dbconn->dbConnect();
          $sql = $database->query($sql);
          $utilities = $sql->fetchAll();

          $sql = "SELECT * FROM categories WHERE `type` = 'utilities'";
          $database = new databaseTool;
          $db_init = $database->dbConnect();
          $db_query = $db_init->query($sql);
          $categories = $db_query->fetchAll();

          require VIEW.'admin/utilities.php';
          return;
     }

}