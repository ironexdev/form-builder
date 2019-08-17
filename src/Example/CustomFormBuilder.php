<?php

namespace Ironex\Example;

use Ironex\Form\Field\Rule\MaxLengthRule;
use Ironex\FormBuilder;

class CustomFormBuilder extends FormBuilder
{
    /**
     * @return MaxLengthRule
     */
    public function createMaxLengthRule(): MaxLengthRule
    {
        $maxLengthRule = $this->maxLengthRuleFactory->create();

        return $maxLengthRule;
    }
}