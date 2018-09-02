<?php

namespace Ironex\Form\Field\Rule\Factory;

use Ironex\Form\Field\Rule\RequiredRule;

class RequiredRuleFactory
{
    /**
     * @return RequiredRule
     */
    public function create(): RequiredRule
    {
        return new RequiredRule();
    }
}