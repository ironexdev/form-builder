<?php

namespace Ironex\Form\Field\Rule;

use Ironex\Form\Field\FieldInterface;

class MatchFieldValueRule extends AbstractRule implements RuleInterface
{
    /**
     * @var FieldInterface
     */
    private $fieldToMatch;

    /**
     * @param FieldInterface $field
     * @return string
     */
    public function getErrorMessage(FieldInterface $field): string
    {
        return strtr($this->errorMessage, [
            "{{fieldLabel}}" => $field->getLabel(),
            "{{fieldValue}}" => $field->getValue(),
            "{{fieldToMatchLabel}}" => $this->fieldToMatch->getLabel(),
            "{{fieldToMatchValue}}" => $this->fieldToMatch->getValue()
        ]);
    }

    /**
     * @param $value
     * @return bool
     */
    public function test($value): bool
    {
        return $this->fieldToMatch->getValue() == $value;
    }

    /**
     * @param FieldInterface $field
     */
    public function setFieldToMatch(FieldInterface $field): void
    {
        $this->fieldToMatch = $field;
        $this->constraint = $field->getName();
    }
}