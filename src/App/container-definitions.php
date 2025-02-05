<?php

declare(strict_types=1);

use App\Config\Paths;
use App\Services\{UserService, ValidatorService};
use Framework\TemplateEngine;

return [
    TemplateEngine::class => fn() => new TemplateEngine(Paths::VIEWS),
    ValidatorService::class => fn() => new ValidatorService(),
    UserService::class => fn() => new UserService()
];
