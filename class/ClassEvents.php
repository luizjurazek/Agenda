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
}