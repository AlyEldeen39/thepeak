<?php

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";
include __DIR__ . "/functions.php";

use App\Config\Paths;
use Framework\App;
use function App\Config\registerRoutes;

$app = new App(Paths::SOURCE . "App/container-definitions.php");

registerRoutes($app);

return $app;
