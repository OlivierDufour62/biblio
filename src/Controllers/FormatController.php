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
    }

    public function findOneFormat($id)
    {
        $format = $this->formatManager->getFormatById($id);
        require 'views/oneformat.php';
    }

    public function displayFormat()
    {
        $format = $this->formatManager->findAll('format');
        require 'views/format.php';
    }
} 