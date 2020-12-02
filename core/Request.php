<?php

namespace Core;

Use Core\Connect;
use PDO;

class Request extends Connect
{

    public function findAll($table)
    {
        $req = $this->getBdd()->prepare("SELECT * FROM $table");
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result;
    }

    public function findById($table, $id)
    {
        $req = $this->getBdd()->prepare("SELECT * FROM $table WHERE $id");
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result;
    }
}
