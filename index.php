<?php

require_once 'vendor/autoload.php';

session_start();

Use App\Controllers\LivreController;
use App\Controllers\FormatController;

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http"). 
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));


$livreController = new LivreController;
$formatController = new FormatController;

try {
    if (empty($_GET['page'])) {
        require "views/accueil.view.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]) {
            case "accueil":
                require "views/accueil.view.php";
                break;
            case "livres":
                if (empty($url[1])) {
                    $livreController->findAllLivres();
                } else if ($url[1] === "l") {
                    $livreController->findOneLivre($url[2]);
                } else if ($url[1] === "a") {
                    $livreController->addLivre();
                } else if ($url[1] === "m") {
                    $livreController->updateLivre($url[2]);
                } else if ($url[1] === "s") {
                    $livreController->suppressionLivre($url[2]);
                } else if ($url[1] === "av") {
                    $livreController->ajoutLivreValidation();
                }else if ($url[1] === "mv") {
                    $livreController->updateLivreValidation();
                }else {
                    throw new Exception("La page n'existe pas");
                }
                break;
            case "formats":
                if (empty($url[1])){
                    $formatController->findAllFormats();
                } else if ($url[1] === "f"){
                    $formatController->findOneFormat($url[2]);
                }
                break;
            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    $msg =  $e->getMessage();
    require 'views/error.view.php';
}