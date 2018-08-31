<?php

namespace Ironex\Form\Field\Rule\Factory;

use Ironex\Form\Field\Rule\MaxValueRule;

class MaxValueRuleFactory
{
    /**
     * @return MaxValueRule
     */
    public function create(): MaxValueRule
    {
        return new MaxValueRule();
    }
}