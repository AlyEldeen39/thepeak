<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Rules\{EmailRule, MatchRule, PhoneRule, RequiredRule};
use Framework\Validator;

class ValidatorService
{
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();

        $this->validator->addRule('required', new RequiredRule());
        $this->validator->addRule('email', new EmailRule());
        $this->validator->addRule('phone', new PhoneRule());
        $this->validator->addRule('match', new MatchRule());
    }

    public function validateInput(array $formData)
    {
        $this->validator->validate($formData, [
            'fullName' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'confirmPassword' => ['required', 'match:password'],
            'phone' => ['required', 'phone'],
            'dob' => ['required'],
            'gender' => ['required']
        ]);
    }
}
