<?php

namespace Models;

use PDOException;
use Tools\databaseTool;

class Equipments{
    public function save($data = []) : bool
    {
        $dbconn = new databaseTool;
        $sql = "INSERT INTO equipments (`title`) VALUES (:title)";
        $database = $dbconn->dbConnect();
        $sql = $database->prepare($sql);
        $sql->bindValue("title", $data['title']);
        
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function update($data = []) : bool
    {
        $dbconn = new databaseTool;
        $sql = "UPDATE equipments SET `title` = :title WHERE id = :id";
        $database = $dbconn->dbConnect();
        $sql = $database->prepare($sql);
        $sql->bindValue("title", $data['title']);
        $sql->bindValue("id", $data['id']);

        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id) : bool
    {
        $dbconn = new databaseTool;
        $sql = "DELETE FROM equipments WHERE id = :id";
        $database = $dbconn->dbConnect();
        $sql = $database->prepare($sql);
        $sql->bindValue("id", $id);

        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function id($id)
    {
        $dbconn = new databaseTool;
        $sql = "SELECT * FROM equipments WHERE id = $id";
        $database = $dbconn->dbConnect();
        $sql = $database->query($sql);
        $equipment = $sql->fetch();

        return $equipment;
    }

    public function all()
    {
        $dbconn = new databaseTool;
        $sql = "SELECT * FROM equipments";
        $database = $dbconn->dbConnect();
        $sql = $database->query($sql);
        $equipments = $sql->fetchAll();

        return $equipments;
    }
}