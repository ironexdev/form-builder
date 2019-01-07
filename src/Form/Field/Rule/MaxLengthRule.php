<?php

namespace Ironex\Form\Field\Rule;

use Ironex\Form\Field\FieldInterface;

class MaxLengthRule extends AbstractRule implements RuleInterface
{
    /**
     * @var int
     */
    private $maxLength;

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
            "{{maxLength}}" => $this->maxLength
        ]);
    }

    /**
     * @param $value
     * @return bool
     */
    public function test($value): bool
    {
        return $this->maxLength >= strlen($value);
    }

    /**
     * @param int $maxLength
     */
    public function setMaxLength(int $maxLength): void
    {
        $this->maxLength = $maxLength;
        $this->constraint = $maxLength;
    }
}