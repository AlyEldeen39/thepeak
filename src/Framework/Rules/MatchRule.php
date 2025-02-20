<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class MatchRule implements RuleInterface
{
    public function validate(array $formData, string $field, array $params): bool
    {
        $field1 = $formData[$field];
        $field2 = $formData[$params[0]];

        return $field1 === $field2;
    }

    public function getMessage(array $formData, string $field, array $params): string
    {
        return "Passwords don't match!";
    }
}
