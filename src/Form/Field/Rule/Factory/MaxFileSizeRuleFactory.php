<?php

namespace Ironex\Form\Field\Rule\Factory;

use Ironex\Form\Field\Rule\MaxFileSizeRule;

class MaxFileSizeRuleFactory
{
    /**
     * @return MaxFileSizeRule
     */
    public function create(): MaxFileSizeRule
    {
        return new MaxFileSizeRule;
    }
}