<?php

namespace App\Security;

use Core\Controller;

class ConnectionAuthenticator extends Controller
{

    private $secure;

    public function construct()
    {
    }

    public function login()
    {
        if (isset($_POST['email']) && isset($_POST['pwd'])) {
            $email = $this->secure('email');
            $pwd = $this->secure('pwd');
            $result = $this->users->findBy($email);
            // echo password_hash($pwd, PASSWORD_BCRYPT);
                if (count($result) > 0) {
                    //Retourne true si le mot de passe en clair est bien le mot de passe haché
                    if(password_verify($pwd, $result['pwd']))
                    {
                    echo 'coucou';
                        session_start();
                        $_SESSION['id'] = $result['id'];
                        $_SESSION['email'] = $result['email'];
                        $_SESSION['lastname'] = $result['lastname'];
                        $_SESSION['firstname'] = $result['firstname'];
                        header('Location:' . URL . 'accueil');
                    } 
                } else {
                    echo "Email ou Mot de passe invalide";
                }
        }
        return $this->render('connection.php');
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location:' . URL . 'connection');
    }
}
