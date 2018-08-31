<?php

namespace Ironex\Form\Field\Rule\Factory;

use Ironex\Form\Field\Rule\MinValueRule;

class MinValueRuleFactory
{
    /**
     * @return MinValueRule
     */
    public function create(): MinValueRule
    {
        return new MinValueRule();
    }
}