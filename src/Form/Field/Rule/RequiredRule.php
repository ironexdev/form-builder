<?php

namespace Ironex\Form\Field\Rule;

class RequiredRule extends AbstractRule implements RuleInterface
{
    /**
     * @var mixed
     */
    protected $constraint = true;

    /**
     * @param $value
     * @return bool
     */
    public function test($value): bool
    {
        return $value ? true : false;
    }
}