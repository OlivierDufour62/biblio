<?php

namespace Core;

Use Core\Connect;
use PDO;

abstract class Model extends Connect
{

    private $id;
    
    public function findAll()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM $this->table");
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result;
    }

    public function findById($id)
    {
        $req = $this->getBdd()->prepare("SELECT * FROM $this->table WHERE $id");
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result;
    }

    public function findBy($email)
    {
        $req = $this->getBdd()->prepare("SELECT * FROM $this->table WHERE email = :email");
        $req->execute([':email'=> $email]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        var_dump($req);
        // $req->closeCursor();
        return $result;
    }

    public function delete()
    {
        $req = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);  
        return $stmt->execute();
        $stmt->closeCursor();
    }
}

