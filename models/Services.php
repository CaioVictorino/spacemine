<?php

namespace Models;

use PDOException;
use Tools\databaseTool;

class Services{
    public function save($data = []) : bool
    {
        $dbconn = new databaseTool;
        $sql = "INSERT INTO brands (`title`) VALUES (:title)";
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
        $sql = "UPDATE brands SET `title` = :title WHERE id = :id";
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
        $sql = "DELETE FROM brands WHERE id = :id";
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
        $sql = "SELECT * FROM brands WHERE id = $id";
        $database = $dbconn->dbConnect();
        $sql = $database->query($sql);
        $brand = $sql->fetch();

        return $brand;
    }

    public function all()
    {
        $dbconn = new databaseTool;
        $sql = "SELECT * FROM brands";
        $database = $dbconn->dbConnect();
        $sql = $database->query($sql);
        $brand = $sql->fetchAll();

        return $brand;
    }
}