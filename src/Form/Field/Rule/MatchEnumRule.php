<?php

namespace Ironex\Form\Field\Rule;

class MatchEnumRule extends AbstractRule implements RuleInterface
{
    /**
     * @var array
     */
    private $enum = [];

    /**
     * @param $value
     * @return void
     */
    public function addValue($value): void
    {
        $this->enum[] = $value;
        $this->constraint = implode(",", $this->enum);
    }

    /**
     * @return array
     */
    public function getEnum(): array
    {
        return $this->enum;
    }

    /**
     * @param array $enum
     * @return void
     */
    public function setEnum(array $enum): void
    {
        $this->enum = $enum;
        $this->constraint = implode(",", $enum);
    }

    /**
     * @param $value
     * @return bool
     */
    public function test($value): bool
    {
        return in_array($value, $this->enum);
    }
}