<?php

namespace Core;

Use Core\Model;


abstract class Security extends Model
{
    public function secure($value)
    {
        return htmlspecialchars($_POST[$value]);
    }

    public function checkSession()
    {
        if (!isset($_SESSION)) {
            header('Location:' . URL . 'connection');
        } else {
            
        }
    }
}