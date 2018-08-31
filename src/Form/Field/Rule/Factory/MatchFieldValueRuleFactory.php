<?php

namespace Ironex\Form\Field\Rule\Factory;

use Ironex\Form\Field\Rule\MatchFieldValueRule;

class MatchFieldValueRuleFactory
{
    /**
     * @return MatchFieldValueRule
     */
    public function create(): MatchFieldValueRule
    {
        return new MatchFieldValueRule();
    }
}