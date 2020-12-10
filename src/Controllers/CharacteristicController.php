<?php


namespace App\Controllers;

use App\Models\Editeurs;
use App\Models\EditeursManager;
use App\Models\FormatManager;
use App\Models\Format;
use Core\Controller;
use Exception;

class CharacteristicController extends Controller
{
    private $formatManager;
    private $format;
    private $editeur;
    private $url2;
    private $nameManager;

    public function __construct()
    {
        $this->formatManager = new FormatManager;
        $this->editeursManager = new EditeursManager;
        $this->format = new Format;
        $this->editeur = new Editeurs;
        $this->url2 = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        $this->nameManager = $this->url2[0] . 'Manager';
    }

    public function findOneFormat($id)
    {
        $this->checkSession();
        $format = $this->format->findById($id);
        return $this->render('oneformat.php', ['format' => $format]);
    }

    public function displayFormat()
    {
        $this->checkSession();
        $format = $this->format->findAll('format');
        return $this->render('format.php', ['format' => $format]);
    }

    public function displayEditeurs()
    {
        $this->checkSession();
        $editeurs = $this->editeur->findAll('editeurs');
        return $this->render('editeurs.php', ['editeurs' => $editeurs]);
    }

    public function addFormat()
    {
        return $this->render('addformat.php');
    }

    // public function addFormatValidation()
    // {
    //     $this->formatManager->addCharacteristicBook($this->secure('name'));
    //     header('Location:' . URL . 'formats');
    // }

    public function addEditeurs()
    {
        $coucou = explode('\\' , strval($this->editeursManager));
        $test = lcfirst($coucou[2]);
        var_dump($test);
        var_dump($this->nameManager === $test);
        return $this->render('addformat.php');
    }

    //a finir 
    public function addCharacteristicValidation()
    {
        $editeurs = explode('\\' , strval($this->editeursManager));
        $format = explode('\\' , strval($this->formatManager));
        // $editeurs = explode('\\' , strval($this->editeursManager));
        $testEditeurs = lcfirst($editeurs[2]);
        $testFormat = lcfirst($format[2]);
        if ($this->nameManager === $testFormat) {
            $this->formatManager->addCharacteristicBook($this->secure('name'));
            header('Location:' . URL . 'formats');
        } else if ($this->nameManager === $testEditeurs) {
            $this->editeursManager->addCharacteristicBook($this->secure('name'));
            header('Location:' . URL . 'editeurs');
        }
    }

    public function updateFormat($id)
    {
        $uFormat = $this->format->findById($id);
        return $this->render('modifierformat.php', ['format' => $uFormat]);
    }

    public function updateFormatValidation()
    {
        $this->formatManager->updateFormat($this->secure('identifiant'), $this->secure('name'));
        $_SESSION['alert'] = [
            'type' => "success",
            'msg' => "Modification réalisé"
        ];
        header('Location: ' . URL . "formats");
    }

    public function deleteFormat($id)
    {
        $this->format->delete($id);
        header('Location: ' . URL . "formats");
    }
}
