<?php

namespace Ironex\Form\Field\Rule\Factory;

use Ironex\Form\Field\Rule\MaxLengthRule;

class MaxLengthRuleFactory
{
    /**
     * @return MaxLengthRule
     */
    public function create(): MaxLengthRule
    {
        return new MaxLengthRule();
    }
}