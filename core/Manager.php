<?php

namespace Core;

use Core\Connect;

class Manager extends Connect{

    public function getManager($object)
    {
        $objectManager = new $object;
        return $objectManager;
    }
}