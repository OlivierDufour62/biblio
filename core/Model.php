<?php

namespace Core;

Use Core\Connect;
use Core\Manager;
use PDO;

abstract class Model extends Manager
{
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
        $req = $this->getBdd()->prepare("SELECT * FROM $this->table WHERE id = $id");
        $req->execute([':id' => $id]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result;
    }

    public function delete($id)
    {
        $req = "DELETE FROM $this->table WHERE id = $id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute([':id' => $id]);
        $stmt->closeCursor();
    }

    public function addCharacteristicBook($name)
    {
        $req = "INSERT INTO $this->table(`name`) VALUES (:name)";
        $stmt = $this->getBdd()->prepare($req);
        $result = $stmt->execute([':name' => $name]);
        $stmt->closeCursor();
        if ($result > 0) {
            foreach ($result as $name) {
                $this->table->setName($name);
            }
        }
    }
}

