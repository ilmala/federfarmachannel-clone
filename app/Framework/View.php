<?php

namespace App\Framework;

use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;

class View
{
    private PhpRenderer $view;

    public function __construct()
    {
        $this->view = new PhpRenderer(__DIR__ . '/../resources/views');
    }

    public static function create()
    {
        return new PhpRenderer(__DIR__ . '/../resources/views');
    }
}