<?php

declare(strict_types=1);

namespace App\Config;

use App\Middleware\{FlashMiddleware, FValidationExceptionMiddleware, SessionMiddleware, TemplateDataMiddleware};
use Framework\App;

function registerMiddlewares(App $app)
{
    $app->addMiddleware(TemplateDataMiddleware::class);
    $app->addMiddleware(FlashMiddleware::class);
    $app->addMiddleware(FValidationExceptionMiddleware::class);
    $app->addMiddleware(SessionMiddleware::class);
}
