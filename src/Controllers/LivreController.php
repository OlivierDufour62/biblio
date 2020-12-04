<?php


namespace App\Controllers;

use App\Models\Livre;
use App\Models\Format;
use App\Models\Editeurs;
use App\Models\Authors;
use App\Models\LivreManager;
use Core\Controller;
use Exception;

class LivreController extends Controller
{
    private $livreManager;
    private $livre;
    private $formats;
    private $authors;
    private $editeurs;

    public function __construct()
    {
        $this->livreManager = new LivreManager;
        $this->livre = new Livre();
        $this->formats = new Format();
        $this->authors = new Authors();
        $this->editeurs = new Editeurs();
    }

    public function displayBook()
    {
        $livres = $this->livre->findAll();
        $this->render('livre.php', ['livres'=>$livres]);
    }

    public function findOneLivre($id)
    {
        $livre = $this->livre->findById($id);
        $this->render('afficherlivre.php', ['livre' => $livre]);
    }

    public function addLivre()
    {
        $formats = $this->formats->findAll();
        $authors = $this->authors->findAll();
        $editeurs = $this->editeurs->findAll();
        $this->render('ajoutlivre.php', ['formats' => $formats, 'authors' => $authors, 'editeurs' => $editeurs]);
    }

    public function ajoutLivreValidation()
    {
        $file = $_FILES['image'];
        $folder = "public/images/";
        $nomImageAjouter = $this->ajoutImage($file, $folder);
        $this->livreManager->add($this->secure('titre'), $this->secure('nbpage'), $nomImageAjouter, $this->secure('format'), $this->secure('select_editeurs'), $this->secure('select_authors'));
        $_SESSION['alert'] = [
            'type' => "success",
            'msg' => "Ajout réalisé"
        ];
        header('Location: ' . URL . "livres");
    }

    public function suppressionLivre($id)
    {
        $nomImage = $this->livre->findById($id)->getImage();
        unlink("public/images/" . $nomImage);
        $this->livre->delete($id);
        $_SESSION['alert'] = [
            'type' => "success",
            'msg' => "Suppression réalisé"
        ];
        header('Location: ' . URL . "livres");
    }

    public function updateLivre($id)
    {
        $livre = $this->livre->findById($id);
        // require "views/modifierlivre.php";
        $this->render('modifierlivre.php', ['livre'=>$livre]);
    }

    public function updateLivreValidation()
    {
        $imageActuelle = $this->livre->findById("livres", $this->secure('identifiant'), $this->secure('nbpage'))->getImage();
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            unlink("public/images/" . $imageActuelle);
            $folder = "public/images/";
            $nomImageAjouter = $this->ajoutImage($file, $folder);
        } else {
            $nomImageAjouter = $imageActuelle;
        }
        $this->livreManager->updateLivreBdd($this->secure('identifiant'), $this->secure('titre'), $this->secure('nbpage'), $nomImageAjouter);
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
