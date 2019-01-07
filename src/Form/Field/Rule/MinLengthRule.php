<?php

namespace Ironex\Form\Field\Rule;

use Ironex\Form\Field\FieldInterface;

class MinLengthRule extends AbstractRule implements RuleInterface
{
    /**
     * @var int
     */
    private $minLength;

    /**
     * @param FieldInterface $field
     * @return string
     */
    public function getErrorMessage(FieldInterface $field): string
    {
        return strtr($this->errorMessage, [
            "{{fieldLabel}}" => $field->getLabel(),
            "{{fieldValue}}" => $field->getValue(),
            "{{fieldValueLength}}" => strlen($field->getValue()),
            "{{minLength}}" => $this->minLength
        ]);
    }

    /**
     * @param int $minLength
     */
    public function setMinLength(int $minLength): void
    {
        $this->minLength = $minLength;
        $this->constraint = $minLength;
    }

    /**
     * @param $value
     * @return bool
     */
    public function test($value): bool
    {
        return $this->minLength <= strlen($value);
    }
}