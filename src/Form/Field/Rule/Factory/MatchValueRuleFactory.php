<?php

namespace Ironex\Form\Field\Rule\Factory;

use Ironex\Form\Field\Rule\MatchValueRule;

class MatchValueRuleFactory
{
    /**
     * @return MatchValueRule
     */
    public function create(): MatchValueRule
    {
        return new MatchValueRule();
    }
}