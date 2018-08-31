<?php

namespace Ironex\Form\Field\Rule\Factory;

use Ironex\Form\Field\Rule\CustomRule;

class CustomRuleFactory
{
    /**
     * @return CustomRule
     */
    public function create(): CustomRule
    {
        return new CustomRule();
    }
}