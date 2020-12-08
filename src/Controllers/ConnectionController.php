<?php


namespace App\Controllers;

use App\Security\ConnectionAuthenticator;
use Core\Controller;
use Exception;
use App\Models\Users;

class ConnectionController extends Controller
{
    private $auth;
    private $users;

    public function __construct()
    {
        $this->auth = new ConnectionAuthenticator;
        $this->users = new Users;
    }
    // public function appLogin()
    // {
    //     if ($this->auth->login()) {
    //         session_start();
    //         // header('Location: ' . URL . "");
    //         var_dump($_POST);
    //     } else {
    //         throw new Exception("Email ou mot de passe invalide");
    //     }
    // }

    public function login()
    {
        // $pwd = $this->secure->secure('password');
        if (isset($_POST['email'])) {
        $email = $_POST['email'];
            $result = $this->users->findBy($email);
            var_dump($result);
            // $email = htmlspecialchars($_POST['email']);
            // $pwd = htmlspecialchars($_POST['password']);
            // $statement = $dbh->prepare('SELECT * FROM users WHERE email=:email');
            // $statement->execute([':email' => $email]);
            // $result2 = $statement->fetch(PDO::FETCH_ASSOC);
            //     if (count($result2) > 0) {
            //         //Retourne true si le mot de passe en clair est bien le mot de passe haché
            //         if(password_verify($pwd, $result2['pwd']))
            //         {
            //             session_start();
            //             $_SESSION['id'] = $result2['id'];
            //             $_SESSION['email'] = $result2['email'];
            //             header('Location: espace.php');

            //         } 
            //     } else {
            //         echo "Email ou Mot de passe invalide";
            //     }
        }

        return $this->render('connection.php');
    }
}
