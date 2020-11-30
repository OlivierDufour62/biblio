<?php


namespace App\Controllers;


Use App\Models\LivreManager;
use Exception;

class LivreController
{
    private $livreManager;

    public function __construct()
    {
        $this->livreManager = new LivreManager;
        $this->livreManager->chargementLivres();
    }

    public function findAllLivres()
    {
        $livres = $this->livreManager->getLivres();
        require "views/livre.view.php";
    }

    public function findOneLivre($id)
    {
        $livre = $this->livreManager->getLivreById($id);
        require "views/afficherlivre.view.php";
    }

    public function addLivre()
    {
        require "views/ajoutlivre.view.php";
    }

    public function ajoutLivreValidation()
    {
        $file = $_FILES['image'];
        $folder = "public/images/";
        $nomImageAjouter = $this->ajoutImage($file, $folder);
        $this->livreManager->ajoutLivreBdd(htmlspecialchars($_POST['titre']), htmlspecialchars($_POST['nbpage']), $nomImageAjouter);
        $_SESSION['alert'] = [
            'type' => "success",
            'msg' => "Ajout réalisé"
        ];
        header('Location: ' . URL . "livres");
    }

    public function suppressionLivre($id)
    {
        $nomImage = $this->livreManager->getLivreById($id)->getImage();
        unlink("public/images/" . $nomImage);
        $this->livreManager->suppressionLivreBdd($id);

        $_SESSION['alert'] = [
            'type' => "success",
            'msg' => "Suppression réalisé"
        ];
        header('Location: ' . URL . "livres");
    }

    public function updateLivre($id)
    {
        $livre = $this->livreManager->getLivreById($id);
        require "views/modifierlivre.view.php";
    }

    public function updateLivreValidation()
    {
        $imageActuelle = $this->livreManager->getLivreById(htmlspecialchars($_POST['nbpage']))->getImage();
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            unlink("public/images/" . $imageActuelle);
            $folder = "public/images/";
            $nomImageAjouter = $this->ajoutImage($file, $folder);
        } else {
            $nomImageAjouter = $imageActuelle;
        }
        $this->livreManager->updateLivreBdd(htmlspecialchars($_POST['identifiant']), htmlspecialchars($_POST['titre']), htmlspecialchars($_POST['nbpage']), $nomImageAjouter);
        $_SESSION['alert'] = [
            'type' => "success",
            'msg' => "Modification réalisé"
        ];
        header('Location: ' . URL . "livres");

    }

    private function ajoutImage($file, $dir)
    {
        if (!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");

        if (!file_exists($dir)) mkdir($dir, 0777);

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $random = rand(0, 99999);
        $target_file = $dir . $random . "_" . $file['name'];

        if (!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if (file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if ($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if (!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random . "_" . $file['name']);
    }
}
