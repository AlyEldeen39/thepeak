<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\Exceptions\FValidationException;

class FValidationExceptionMiddleware implements MiddlewareInterface
{
    public function process(callable $next)
    {
        try {
            $next();
        } catch (FValidationException $exception) {
            $excludedFileds = ['password', 'confirmPassword'];
            $filteredFields = array_diff($_POST, array_flip($excludedFileds));

            $_SESSION['oldFormData'] = $filteredFields;
            $_SESSION['errors'] = $exception->errors;

            $referer = $_SERVER['HTTP_REFERER'];
            redirectTo($referer);
        }
    }
}
