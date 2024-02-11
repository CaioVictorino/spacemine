<?php

namespace Models;

use PDOException;
use Tools\databaseTool;

class Costumer{
    public function save($data = []) : bool
    {
        $tool = new databaseTool;
        $database = $tool->dbConnect();

        $sql_base = "INSERT INTO costumers ";
        $sql_columns = "(
            `name`,
            `surname`,
            `razao_social`,
            `nome_fantasia`,
            `born_date`,
            `cpf/cnpj`,
            `contact`,
            `password`,
            `email`,
            `instagram`,
            `horario_func`,
            `equipments`,
            `zipcode`,
            `state`,
            `city`,
            `neighborhood`,
            `street`,
            `number`,
            `services`,
            `brands`,
            `start_date`,
            `access`
        )";

        $sql_values = "VALUES (
            :name,
            :surname,
            :razao_social,
            :nome_fantasia,
            :born_date,
            :cpf/cnpj,
            :contact,
            :password,
            :email,
            :instagram,
            :horario_func,
            :equipments,
            :zipcode,
            :state,
            :city,
            :neighborhood,
            :street,
            :number,
            :services,
            :brands,
            :start_date,
            :access
        )";

        $sql = $sql_base.$sql_columns.$sql_values;

        $prepare = $database->prepare($sql);
        $prepare->bindValue("name", $data['name']);
        $prepare->bindValue("surname", $data['surname']);
        $prepare->bindValue("razao_social", $data['razao_social']);
        $prepare->bindValue("nome_fantasia", $data['nome_fantasia']);
        $prepare->bindValue("born_date", $data['born_date']);
        $prepare->bindValue("cpf/cnpj", $data['cpf/cnpj']);
        $prepare->bindValue("contact", $data['contact']);
        $prepare->bindValue("password", $data['password']);
        $prepare->bindValue("email", $data['email']);
        $prepare->bindValue("instagram", $data['instagram']);
        $prepare->bindValue("horario_func", $data['horario_func']);
        $prepare->bindValue("equipments", $data['equipments']);
        $prepare->bindValue("zipcode", $data['zipcode']);
        $prepare->bindValue("state", $data['state']);
        $prepare->bindValue("city", $data['city']);
        $prepare->bindValue("neighborhood", $data['neighborhood']);
        $prepare->bindValue("street", $data['street']);
        $prepare->bindValue("number", $data['number']);
        $prepare->bindValue("services", $data['services']);
        $prepare->bindValue("brands", $data['brands']);
        $prepare->bindValue("start_date", date("Y-m-d"));
        $prepare->bindValue("access", "costumer");

        try{
            $execute = $prepare->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
        
    
    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}