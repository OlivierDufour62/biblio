<?php

namespace App\Models;


Use Core\Model;
Use App\Models\Format;
use PDO;
use Exception;

class FormatManager extends Model
{

    private $formats;

    public function ajoutFormat($format)
    {
        $this->formats[] = $format;

    }

    public function getFormats()
    {
        return $this->formats;
    }

    public function chargementFormats()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM format");
        $req->execute();
        $mesFormats = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach ($mesFormats as $format) {
            $f = new Format($format['id'], $format['name']);
            // var_dump($f);
            $this->ajoutFormat($f);
        }
    }

    public function getFormatById($id)
    {
        for($i = 0; count($this->formats); $i++){
            if($this->formats[$i]->getId() === $id){
                return $this->formats[$i];
            }
        }
    }
}