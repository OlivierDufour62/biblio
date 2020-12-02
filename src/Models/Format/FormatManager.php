<?php

namespace App\Models;


Use Core\Request;
Use App\Models\Format;
use PDO;
use Exception;

class FormatManager extends Request
{

    private $formats;

    public function ajoutFormat($format)
    {
        $this->formats[] = $format;
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