<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class PhoneRule implements RuleInterface
{
    public function validate(array $formData, string $field, array $params): bool
    {
        return (bool) preg_match('#^[0-9]{11}+$#', $formData['phone']);
    }

    public function getMessage(array $formData, string $field, array $params): string
    {
        return "Please provide a valid phone number!";
    }
}
