<?php

declare(strict_types=1);

namespace Framework;

use Framework\Contracts\RuleInterface;
use Framework\Exceptions\FValidationException;

class Validator
{
    private array $rules = [];

    public function addRule(string $alias, RuleInterface $rule)
    {
        $this->rules[$alias] = $rule;
    }

    public function validate(array $formData, array $fieldRules)
    {
        $errors = [];

        foreach ($fieldRules as $fieldName => $rules) {
            foreach ($rules as $rule) {
                $ruleParams = [];

                if (str_contains($rule, ':')) {
                    [$rule, $ruleParams] = explode(':', $rule);
                    $ruleParams = explode(',', $ruleParams);
                }

                $ruleApplied = $this->rules[$rule];

                if ($ruleApplied->validate($formData, $fieldName, $ruleParams)) {
                    continue;
                }
                $errors[$fieldName][] = $ruleApplied->getMessage($formData, $fieldName, $ruleParams);
            }
        }

        if (count($errors)) {
            throw new FValidationException($errors);
        }
    }
}
