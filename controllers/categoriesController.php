<?php

namespace Controllers;

use Tools\databaseTool;
use PDOException;

class categoriesController{
     public function __construct($method)
     {
          $this->$method();
          return;
     }

     public function index()
     {
          $database = new databaseTool;
          $sql = "SELECT * FROM categories";
          $dbconn = $database->dbConnect();
          $query = $dbconn->query($sql);
          $categories = $query->fetchAll();

          require VIEW.'admin/categories.php';
          return;
     }

     public function register()
     {
          $dbconn = new databaseTool;
          $sql = "INSERT INTO categories (title, description, type) VALUES (:title, :description, :type)";
          $database = $dbconn->dbConnect();
          $sql = $database->prepare($sql);
          $sql->bindValue("title", $_POST['title']);
          $sql->bindValue("description", $_POST['description']);
          $sql->bindValue("type", $_POST['type']);

          try{
               $sql->execute();
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "success";
               $title = "Sucesso!";
               $message = 'Categoria cadastrada com sucesso';
          } catch (PDOException $e){
               $eCode = $e->getCode();
               switch ($eCode){
                    case '23000':
                         $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
                         $status = "danger";
                         $title = "Oops!";
                         $message = 'Categoria já cadastrada.';
                         break;
                    default:
                         $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
                         $status = "danger";
                         $title = "Oops!";
                         $message = "Ocorreu um erro: ".$e->getMessage();
                         break;
                    
               }
          }

          $dbconn = new databaseTool;
          $database = $dbconn->dbConnect();
          $query = $database->query("SELECT * FROM categories");
          $categories = $query->fetchAll();

          require VIEW.'admin/categories.php';
          return;
     }


     public function edit()
     {
          $id = $_GET['id'];

          $dbconn = new databaseTool;
          $sql = "SELECT * FROM categories WHERE id = $id";
          $database = $dbconn->dbConnect();
          $sql = $database->query($sql);
          $category = $sql->fetch();

          require VIEW.'admin/categories-edit.php';
          return;
     }

     public function update()
     {
          $id = $_POST['id'];

          $dbconn = new databaseTool;
          $sql = "UPDATE categories SET `title` = :title, `description` = :description, `type` = :type WHERE id = $id";
          $database = $dbconn->dbConnect();
          $sql = $database->prepare($sql);
          $sql->bindValue("title", $_POST['title']);
          $sql->bindValue("description", $_POST['description']);
          $sql->bindValue("type", $_POST['type']);

          try{
               $sql->execute();
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "info";
               $title = "Sucesso!";
               $message = 'Categoria editada com sucesso';
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
          $sql = "SELECT * FROM categories WHERE id = $id";
          $database = $dbconn->dbConnect();
          $sql = $database->query($sql);
          $category = $sql->fetch();

          require VIEW.'admin/categories-edit.php';
          return;
     }

     public function delete()
     {
          $id = $_GET['id'];
          $database = new databaseTool;
          $sql = "SELECT * FROM categories WHERE id = $id";
          $dbconn = $database->dbConnect();
          $query = $dbconn->query($sql);
          $categoryGet = $query->fetch();

          $database = new databaseTool;
          $sql = "DELETE FROM categories WHERE id = $id";
          $dbconn = $database->dbConnect();
          
          try{
               $query = $dbconn->query($sql);
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "info";
               $title = "Sucesso!";
               $message = "Categoria <b>".$categoryGet['title']."</b> deletada com sucesso";
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
          $sql = "SELECT * FROM categories";
          $database = $dbconn->dbConnect();
          $sql = $database->query($sql);
          $categories = $sql->fetchAll();

          require VIEW.'admin/categories.php';
          return;
     }
}