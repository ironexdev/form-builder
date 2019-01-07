<?php

namespace Ironex\Form\Field\Rule;

use Ironex\Form\Field\FieldInterface;

class MatchEnumRule extends AbstractRule implements RuleInterface
{
    /**
     * @var array
     */
    private $enum = [];

    /**
     * @param FieldInterface $field
     * @return string
     */
    public function getErrorMessage(FieldInterface $field): string
    {
        return strtr($this->errorMessage, [
            "{{fieldLabel}}" => $field->getLabel(),
            "{{fieldValue}}" => $field->getValue(),
            "{{allowedValues}}" => $this->constraint
        ]);
    }

    /**
     * @param $value
     * @return void
     */
    public function addValue($value): void
    {
        $this->enum[] = $value;
        $this->constraint = implode(",", $this->enum);
    }

    /**
     * @param array $enum
     * @return void
     */
    public function setEnum(array $enum): void
    {
        $this->enum = $enum;
        $this->constraint = implode(",", $enum);
    }

    /**
     * @param $value
     * @return bool
     */
    public function test($value): bool
    {
        return in_array($value, $this->enum);
    }
}