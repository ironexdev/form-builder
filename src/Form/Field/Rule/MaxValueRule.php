<?php

namespace Ironex\Form\Field\Rule;

use Ironex\Form\Field\FieldInterface;

class MaxValueRule extends RuleAbstract implements RuleInterface
{
    /**
     * @var int
     */
    private $max;

    /**
     * @param FieldInterface $field
     * @return string
     */
    public function getErrorMessage(FieldInterface $field): string
    {
        return strtr($this->errorMessage, [
            "{{fieldLabel}}" => $field->getLabel(),
            "{{fieldValue}}" => $field->getValue(),
            "{{maxValue}}" => $this->max
        ]);
    }

    /**
     * @param int $max
     */
    public function setMax(int $max): void
    {
        $this->max = $max;
        $this->constraint = $max;
    }

    /**
     * @param $value
     * @return bool
     */
    public function test($value): bool
    {
        return $this->max >= $value;
    }

    private function __clone()
    {
    }
}