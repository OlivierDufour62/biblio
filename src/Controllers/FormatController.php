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
        $format = $this->format->findById($id);
        $this->render('oneformat.php', ['format' => $format]);
    }

    public function displayFormat()
    {
        $format = $this->format->findAll('format');
        $this->render('format.php', ['format' => $format ]);
    }

} 