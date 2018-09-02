<?php

namespace Ironex\Form\Field\Rule\Factory;

use Ironex\Form\Field\Rule\MatchMimeTypeRule;

class MatchMimeTypeRuleFactory
{
    /**
     * @return MatchMimeTypeRule
     */
    public function create(): MatchMimeTypeRule
    {
        return new MatchMimeTypeRule();
    }
}