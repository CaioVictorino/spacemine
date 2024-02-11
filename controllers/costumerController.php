<?php

namespace Controllers;

use Tools\databaseTool;
use Tools\urlTool;
use PDOException;

class costumerController 
{

     public function __construct($method)
     {
          $this->$method();
     }

     public function index()
     {

          $dbconn = new databaseTool;
          $database = $dbconn->dbConnect();
          $query = $database->query("SELECT * FROM costumers");
          $costumers = $query->fetchAll();
          require_once VIEW.'admin/costumer.php';
     }

     public function register()
     {

          $dbconn = new databaseTool;
          $sql = "INSERT INTO costumers (`email`, `cpf/cnpj`, `name`, `surname`, `contact`, `password`, `born_date`, `start_date`, `access`) VALUES (:email, :document, :name, :surname, :contact, :password, :born_date, :start_date, :access)";
          $database = $dbconn->dbConnect();
          $sql = $database->prepare($sql);
          $sql->bindValue("email", $_POST['email']);
          $sql->bindValue("document", $_POST['document']);
          $sql->bindValue("name", $_POST['name']);
          $sql->bindValue("surname", $_POST['surname']);
          $sql->bindValue("contact", $_POST['contact']);
          $sql->bindValue("password", password_hash($_POST['contact'], PASSWORD_DEFAULT));
          $sql->bindValue("born_date", $_POST['born_date']);
          $sql->bindValue("start_date", date("Y-m-d"));
          $sql->bindValue("access", "costumer");

          try{
               $sql->execute();
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "success";
               $title = "Sucesso!";
               $message = 'Usuário cadastrado com sucesso';
          } catch (PDOException $e){
               $eCode = $e->getCode();
               switch ($eCode){
                    case '23000':
                         $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
                         $status = "danger";
                         $title = "Oops!";
                         $message = 'Usuário já possuí registro.';
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
          $query = $database->query("SELECT * FROM costumers WHERE `email` = '".$_POST['email']."'");
          $costumerData = $query->fetch();
          $uid = $costumerData['id'];

          $dbconn = new databaseTool;
          $sql = "INSERT INTO adress (`id_costumer`, `zipcode`, `state`, `city`, `neighborhood`, `street`) VALUES (:id_costumer, :zipcode, :state, :city, :neighborhood, :street)";
          $database = $dbconn->dbConnect();
          $sql = $database->prepare($sql);
          $sql->bindValue("id_costumer", $uid);
          $sql->bindValue("zipcode", $_POST['zipcode']);
          $sql->bindValue("state", $_POST['state']);
          $sql->bindValue("city", $_POST['city']);
          $sql->bindValue("neighborhood", $_POST['neighborhood']);
          $sql->bindValue("street", $_POST['street']);

          try{
               $sql->execute();
          } catch (PDOException $e){
               $eCode = $e->getCode();
               switch ($eCode){
                    default:
                         $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
                         $status = "warning";
                         $title = "Oops!";
                         $message = "Usuário foi registrado <b>sem endereço</b>";
                         break;
               }
          }


          $dbconn = new databaseTool;
          $database = $dbconn->dbConnect();
          $query = $database->query("SELECT * FROM costumers");
          $costumers = $query->fetchAll();

          require VIEW.'admin/costumer.php';
          return;
     }

     public function edit()
     {
          $id = $_GET['id'];

          $dbconn = new databaseTool;
          $sql = "SELECT * FROM `costumers` INNER JOIN `adress` ON costumers.id = adress.id_costumer WHERE costumers.id = $id";
          $database = $dbconn->dbConnect();
          $sql = $database->query($sql);
          $costumer = $sql->fetch();


          require VIEW.'admin/costumer-edit.php';
          return;
     }

     public function update()
     {
          $id = $_POST['id'];

          $dbconn = new databaseTool;
          $sql = "UPDATE costumers SET `email` = :email, `cpf/cnpj` = :document, `name` = :name, `surname` = :surname, `contact` = :contact, `born_date` = :born_date, `access` = :access WHERE `id` = $id";
          $database = $dbconn->dbConnect();
          $sql = $database->prepare($sql);
          $sql->bindValue("email", $_POST['email']);
          $sql->bindValue("document", $_POST['document']);
          $sql->bindValue("name", $_POST['name']);
          $sql->bindValue("surname", $_POST['surname']);
          $sql->bindValue("contact", $_POST['contact']);
          $sql->bindValue("born_date", $_POST['born_date']);
          $sql->bindValue("access", "costumer");


          try{
               $sql->execute();
               $icon = '<i class="fa-solid fa-check-double"></i>';
               $status = "info";
               $title = "Sucesso!";
               $message = 'Usuário editado com sucesso';
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
          $sql = "UPDATE adress SET `zipcode` = :zipcode, `state` = :state, `city` = :city, `neighborhood` = :neighborhood, `street` = :street WHERE `id_costumer` = $id";
          $database = $dbconn->dbConnect();
          $sql = $database->prepare($sql);
          $sql->bindValue("zipcode", $_POST['zipcode']);
          $sql->bindValue("state", $_POST['state']);
          $sql->bindValue("city", $_POST['city']);
          $sql->bindValue("neighborhood", $_POST['neighborhood']);
          $sql->bindValue("street", $_POST['street']);

          try{
               $sql->execute();
          } catch (PDOException $e){
               $eCode = $e->getCode();
               switch ($eCode){
                    default:
                         $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
                         $status = "warning";
                         $title = "Oops!";
                         $message = "Usuário foi editado <b>sem endereço</b>";
                         break;
               }
          }

          $sql = "SELECT * FROM `costumers` INNER JOIN `adress` ON costumers.id = adress.id_costumer WHERE costumers.id = $id";
          $database = $dbconn->dbConnect();
          $sql = $database->query($sql);
          $costumer = $sql->fetch();

          require VIEW.'admin/costumer-edit.php';
          return;
     }
     
     public function delete()
     {
          $id = $_GET['id'];

          $dbconn = new databaseTool;
          $sql = "SELECT * FROM `costumers` WHERE id = $id";
          $database = $dbconn->dbConnect();
          $sql = $database->query($sql);
          $costumerData = $sql->fetchAll();
          $countCostumer = count($costumerData);

          $dbconn = new databaseTool;
          $sql = "DELETE FROM `costumers` WHERE id = :id";
          $database = $dbconn->dbConnect();
          $sql = $database->prepare($sql);
          $sql->bindValue("id", $id);

          try{
               $sql->execute();
               if($countCostumer > 0){
                    $message = "Usuário <b>".$costumerData[0]['name']." ".$costumerData[0]['surname']."</b> deletado com sucesso!";    
               }
          } catch (PDOException $e){
               $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
               $status = "danger";
               $title = "Oops!";
               $message = 'Ocorreu um erro ao o excluir usuário id: '.$id;
          }

          $dbconn = new databaseTool;
          $database = $dbconn->dbConnect();
          $query = $database->query("SELECT * FROM costumers");
          $costumers = $query->fetchAll();

          $icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
          $status = "warning";
          $title = "Atenção!";
          
          require VIEW.'admin/costumer.php';
          return;
     }

}