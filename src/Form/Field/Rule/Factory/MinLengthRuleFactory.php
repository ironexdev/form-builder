<?php

namespace Ironex\Form\Field\Rule\Factory;

use Ironex\Form\Field\Rule\MinLengthRule;

class MinLengthRuleFactory
{
    /**
     * @return MinLengthRule
     */
    public function create(): MinLengthRule
    {
        return new MinLengthRule();
    }
}