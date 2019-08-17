<?php

namespace Ironex\Form\Field\Rule;

class MaxLengthRule extends AbstractRule implements RuleInterface
{
    /**
     * @var int
     */
    private $maxLength;

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