<?php

namespace Ironex\Form\Field\Rule\Factory;

use Ironex\Form\Field\Rule\MatchEnumRule;

class MatchEnumRuleFactory
{
    /**
     * @return MatchEnumRule
     */
    public function create(): MatchEnumRule
    {
        return new MatchEnumRule();
    }
}