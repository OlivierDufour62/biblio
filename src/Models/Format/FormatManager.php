<?php

namespace App\Models;


use Core\Model;
use App\Models\Format;

class FormatManager extends Format
{

    private $formats;

    public function ajoutFormat($format)
    {
        $this->formats[] = $format;
    }

    public function add($name)
    {
        $req = "INSERT INTO `format`(`name`) VALUES (:name)";
        $stmt = $this->getBdd()->prepare($req);
        $result = $stmt->execute([':name' => $name]);
        $stmt->closeCursor();
        if ($result > 0) {
            foreach ($result as $name) {
                $this->setName($name);
            }
        }
    }

    public function updateFormat($id, $name)
    {
        $req = "UPDATE $this->table SET id = :id, name = :name WHERE id = :id";
        var_dump($req);
        $stmt = $this->getBdd()->prepare($req);
        $result = $stmt->execute([':id' => $id, ':name' => $name]);
        $stmt->closeCursor();
        if ($result > 0) {
            foreach ($result as $name) {
                $this->findById($id)->setName($name);
            }
        }
    }
}
