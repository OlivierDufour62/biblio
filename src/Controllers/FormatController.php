<?php


namespace App\Controllers;


Use App\Models\FormatManager;
use Exception;

class FormatController
{
    private $formatManager;

    public function __construct()
    {
        $this->formatManager = new FormatManager;
        $this->formatManager->chargementFormats();
    }

    public function findAllFormats()
    {
        $format = $this->formatManager->getFormats();
        require 'views/format.php';
    }

    public function findOneFormat($id)
    {
        $format = $this->formatManager->getFormatById($id);
        require 'views/oneformat.php';
    }
} 