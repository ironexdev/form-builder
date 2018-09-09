<?php

namespace Ironex\Form\Field\Rule;

use Ironex\Form\Field\FieldInterface;

class MatchValueRule extends RuleAbstract implements RuleInterface
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @param FieldInterface $field
     * @return string
     */
    public function getErrorMessage(FieldInterface $field): string
    {
        return strtr($this->errorMessage, [
            "{{fieldLabel}}" => $field->getLabel(),
            "{{fieldValue}}" => $field->getValue(),
            "{{allowedValue}}" => $this->value
        ]);
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
        $this->constraint = $value;
    }

    /**
     * @param $value
     * @return bool
     */
    public function test($value): bool
    {
        return $this->value == $value;
    }
}