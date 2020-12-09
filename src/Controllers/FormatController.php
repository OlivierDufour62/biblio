<?php


namespace App\Controllers;


Use App\Models\FormatManager;
Use App\Models\Format;
use Core\Controller;
use Exception;

class FormatController extends Controller
{
    private $formatManager;
    private $format;

    public function __construct()
    {
        $this->formatManager = new FormatManager;
        $this->format = new Format;
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
        return $this->render('format.php', ['format' => $format ]);
    }

    public function addFormat()
    {
        return $this->render('addformat.php');
    }

    public function addFormatValidation()
    {
        $this->formatManager->add($this->secure('name'));
        header('Location:' . URL . 'formats');
    }

    public function updateFormat($id)
    {
        $uFormat = $this->format->findById($id);
        return $this->render('modifierformat.php', ['format'=> $uFormat]);
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