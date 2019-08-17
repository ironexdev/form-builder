<?php

namespace Ironex\Form\Field\Rule;

class MatchValueRule extends AbstractRule implements RuleInterface
{
    /**
     * @var mixed
     */
    private $value;

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