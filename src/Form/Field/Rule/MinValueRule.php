<?php

namespace Ironex\Form\Field\Rule;

class MinValueRule extends AbstractRule implements RuleInterface
{
    /**
     * @var int
     */
    private $min;

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
}