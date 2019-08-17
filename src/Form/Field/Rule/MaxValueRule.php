<?php

namespace Ironex\Form\Field\Rule;

class MaxValueRule extends AbstractRule implements RuleInterface
{
    /**
     * @var int
     */
    private $max;

    /**
     * @return int
     */
    public function getMax(): int
    {
        return $this->max;
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
}