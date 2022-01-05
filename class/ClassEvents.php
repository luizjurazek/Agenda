<?php
namespace Classes;

use Models\ModelConect;

class ClassEvents extends ModelConect{
    #trazer os dados de eventos do banco
    public function getEvents(){
        $b = $this->conectDB()->prepare("SELECT * FROM events");
        $b->execute();
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($f);
    }

    #Criacao da consulta no banco
    public function createEvent($id=0, $title, $description, $color='blue', $start, $end){
        $b = $this->conectDB()->prepare("INSERT INTO events VALUES (?,?,?,?,?,?)");
        $b->bindParam(1, $id, \PDO::PARAM_INT);
        $b->bindParam(2, $title, \PDO::PARAM_STR);
        $b->bindParam(3, $description, \PDO::PARAM_STR);
        $b->bindParam(4, $color, \PDO::PARAM_STR);
        $b->bindParam(5, $start, \PDO::PARAM_STR);
        $b->bindParam(6, $end, \PDO::PARAM_STR);
        $b->execute();
    }
}