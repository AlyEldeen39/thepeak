<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\FValidationException;

class UserService
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database($_ENV['DB_DRIVER'], [
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'dbname' => $_ENV['DB_NAME']
        ], $_ENV['DB_USER'], $_ENV['DB_PASS']);
    }

    public function isEmailTaken(string $email)
    {
        $emailCount = $this->db->query("SELECT COUNT(*) FROM users WHERE email=:email", ['email' => $email])->fetch();

        if ($emailCount > 0) {
            throw new FValidationException(['email' => ['This email is already registered!']]);
        }
    }

    public function createUser($formData)
    {
        $this->db->query("INSERT INTO users(name, email, password, phone, dob, gender) VALUES(:name, :email, :password, :phone, :dob, :gender)", [
            'name' => $formData['fullName'],
            'email' => $formData['email'],
            'password' => $formData['password'],
            'phone' => $formData['phone'],
            'dob' => $formData['dob'],
            'gender' => $formData['gender']
        ]);
    }
}
