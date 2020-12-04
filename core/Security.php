<?php

namespace Core;

abstract class Security
{
    public function secure($value)
    {
        return htmlspecialchars($_POST[$value]);
    }
}