<?php

namespace App\Security;

use Core\Model;
use Core\Security;


class ConnectionAuthenticator extends Model
{

    private $secure;

    public function construct()
    {
        $this->secure = new Security();
    }

    
}
