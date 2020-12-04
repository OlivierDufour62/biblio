<?php

namespace Core;

use Core\Security;

abstract class Controller extends Security
{
    public function render($file='', $data = [])
    {
        extract($data);
        require "views/$file";
    }
}