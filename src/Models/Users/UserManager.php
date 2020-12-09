<?php

namespace App\Models;



Use App\Models\Users;
use PDO;
use Exception;


class UserManager extends Users
{
    public function findByEmail($email)
    {
        $req = $this->getBdd()->prepare("SELECT * FROM $this->table WHERE email = :email");
        $req->execute([':email'=> $email]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        var_dump($req);
        $req->closeCursor();
        return $result;
    }
}