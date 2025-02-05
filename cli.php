<?php

declare(strict_types=1);

require __DIR__ . "/vendor/autoload.php";

use Framework\Database;

$db = new Database('mysql', [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'thepeak'
], 'root', '');
