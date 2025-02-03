<?php

declare(strict_types=1);

namespace App\Config;

use App\Middleware\TemplateDataMiddleware;
use Framework\App;

function registerMiddlewares(App $app)
{
    $app->addMiddleware(TemplateDataMiddleware::class);
}
