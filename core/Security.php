<?php

namespace Core;

Use Core\Model;


abstract class Security extends Model
{
    public function secure($value)
    {
        return htmlspecialchars($_POST[$value]);
    }
}