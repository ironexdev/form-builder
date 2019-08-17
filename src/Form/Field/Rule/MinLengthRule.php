<?php

namespace Ironex\Form\Field\Rule;

class MinLengthRule extends AbstractRule implements RuleInterface
{
    /**
     * @var int
     */
    private $minLength;

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