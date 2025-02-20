<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Exceptions\SessionException;
use Framework\Contracts\MiddlewareInterface;

class SessionMiddleware implements MiddlewareInterface
{
    public function process(callable $next)
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            throw new SessionException("Session already started!");
        }

        if (headers_sent($filename, $line)) {
            throw new SessionException("Headers already sent. Enable Output Buffering. Data outputted from {$filename} - Line {$line}");
        }

        session_start();

        $next();

        session_write_close();
    }
}
