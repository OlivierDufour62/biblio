<?php

require_once 'vendor/autoload.php';

session_start();

use App\Controllers\LivreController;
use App\Controllers\CharacteristicController;
use App\Controllers\ConnectionController;


define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));


$livreController = new LivreController;
$CharacteristicController = new CharacteristicController;
$auth = new ConnectionController;

try {
    if (empty($_GET['page'])) {
        require "views/accueil.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]) {
            case "connection":
                if (isset($_SESSION)) {
                    $auth->login();
                    break;
                }
            case "disconnect":
                if (isset($_SESSION)) {
                    $auth->logout();
                    break;
                }
            case "accueil":
                require "views/accueil.php";
                break;
            case "livres":
                if (empty($url[1])) {
                    $livreController->displayBook();
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
                } else if ($url[1] === "mv") {
                    $livreController->updateLivreValidation();
                } else {
                    throw new Exception("La page n'existe pas");
                }
                break;
            case "format":
                if (empty($url[1])) {
                    $CharacteristicController->displayFormat();
                } else if ($url[1] === "f") {
                    $CharacteristicController->findOneFormat($url[2]);
                } else if ($url[1] === "a") {
                    $CharacteristicController->addFormat();
                } else if ($url[1] === "av") {
                    $CharacteristicController->addCharacteristicValidation();
                } else if ($url[1] === "m") {
                    $CharacteristicController->updateFormat($url[2]);
                } else if ($url[1] === "mfv") {
                    $CharacteristicController->updateFormatValidation();
                } else if ($url[1] === "s") {
                    $CharacteristicController->deleteFormat($url[2]);
                }
                break;
            case "editeurs":
                if (empty($url[1])) {
                    $CharacteristicController->displayEditeurs();
                } else if ($url[1] === "f") {
                    $CharacteristicController->findOneFormat($url[2]);
                } else if ($url[1] === "a") {
                    $CharacteristicController->addEditeurs();
                } else if ($url[1] === "av") {
                    $CharacteristicController->addCharacteristicValidation();
                } else if ($url[1] === "m") {
                    $CharacteristicController->updateFormat($url[2]);
                } else if ($url[1] === "mfv") {
                    $CharacteristicController->updateFormatValidation();
                } else if ($url[1] === "s") {
                    $CharacteristicController->deleteFormat($url[2]);
                }
                break;
            case "auteurs":
                if (empty($url[1])) {
                    $CharacteristicController->displayAuthors();
                } else if ($url[1] === "f") {
                    $CharacteristicController->findOneFormat($url[2]);
                } else if ($url[1] === "a") {
                    $CharacteristicController->addAuteurs();
                } else if ($url[1] === "av") {
                    $CharacteristicController->addCharacteristicValidation();
                } else if ($url[1] === "m") {
                    $CharacteristicController->updateFormat($url[2]);
                } else if ($url[1] === "mfv") {
                    $CharacteristicController->updateFormatValidation();
                } else if ($url[1] === "s") {
                    $CharacteristicController->deleteFormat($url[2]);
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
