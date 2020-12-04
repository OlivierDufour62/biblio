<?php


namespace App\Controllers;


Use App\Models\FormatManager;
Use App\Models\Format;
use Exception;

class FormatController
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
        $format = $this->formatManager->getFormatById($id);
        require 'views/oneformat.php';
    }

    public function displayFormat()
    {
        $format = $this->format->findAll('format');
        // var_dump($format);
        require 'views/format.php';
    }

} 