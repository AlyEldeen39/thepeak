<?php

declare(strict_types=1);

namespace Framework\Contracts;

use Framework\TemplateEngine;

interface MiddlewareInterface
{
    public function process(callable $next);
}
