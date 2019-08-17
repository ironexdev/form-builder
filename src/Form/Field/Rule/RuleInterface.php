<?php

namespace Ironex\Form\Field\Rule;

interface RuleInterface
{
    /**
     * @return mixed
     */
    public function getConstraint();

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param $value
     * @return bool
     */
    public function test($value): bool;
}