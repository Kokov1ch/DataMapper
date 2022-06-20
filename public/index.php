<?php
    use App\Core;
    require_once dirname(__DIR__).'/vendor/autoload.php';
    $app = new Core\Application();
    $app->run();
