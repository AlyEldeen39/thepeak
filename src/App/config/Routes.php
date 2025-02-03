<?php

declare(strict_types=1);

namespace App\Config;

use App\Controllers\{HomeController, AuthController};
use Framework\App;

function registerRoutes(App $app)
{
    $app->get("/", [HomeController::class, "home"]);
    $app->get("/register", [AuthController::class, "registerView"]);
}
