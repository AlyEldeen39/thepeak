<?php

declare(strict_types=1);

function dd(mixed $data)
{
    echo "<pre>";
    var_dump($data);
    echo "<pre>";
    die();
}

function escape(mixed $data)
{
    return htmlspecialchars((string) $data);
}

function redirectTo(string $path)
{
    header("Location: {$path}");
    http_response_code(302);
    exit;
}
