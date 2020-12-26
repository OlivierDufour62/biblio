<?php

namespace App\Models;


use Core\Model;
use App\Models\Authors;

class AuteursManager extends Authors
{

    private $formats;

    public function ajoutFormat($format)
    {
        $this->formats[] = $format;
    }

    public function updateAuthors($id, $name)
    {
        $req = "UPDATE $this->table SET id = :id, name = :name WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $result = $stmt->execute([':id' => $id, ':name' => $name]);
        $stmt->closeCursor();
        if ($result > 0) {
            foreach ($result as $name) {
                $this->findById($id)->setName($name);
            }
        }
    }

    public function __toString()
    {
        return __CLASS__;
    }
}