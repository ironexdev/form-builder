<?php

namespace Ironex\Form\Field\Rule;

use Ironex\Form\Field\FieldInterface;

class MinValueRule extends RuleAbstract implements RuleInterface
{
    /**
     * @var int
     */
    private $min;

    /**
     * @param FieldInterface $field
     * @return string
     */
    public function getErrorMessage(FieldInterface $field): string
    {
        return strtr($this->errorMessage, [
            "{{fieldLabel}}" => $field->getLabel(),
            "{{fieldValue}}" => $field->getValue(),
            "{{minValue}}" => $this->min
        ]);
    }

    /**
     * @param int $min
     */
    public function setMin(int $min): void
    {
        $this->constraint = $min;
        $this->min = $min;
    }

    /**
     * @param $value
     * @return bool
     */
    public function test($value): bool
    {
        return $this->min <= $value;
    }

    private function __clone()
    {
    }
}