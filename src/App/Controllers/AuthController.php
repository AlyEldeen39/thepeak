<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\{UserService, ValidatorService};
use Framework\{TemplateEngine};

class AuthController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService,
        private UserService $userService
    ) {}

    public function registerView()
    {
        echo $this->view->render("register.php");
    }

    public function register()
    {
        $this->validatorService->validateInput($_POST);

        $this->userService->isEmailTaken($_POST['email']);

        $this->userService->createUser($_POST);

        redirectTo('/');
    }
}
