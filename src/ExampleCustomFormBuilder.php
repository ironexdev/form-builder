<?php

namespace Ironex;

use Ironex\Form\Field\Rule\MaxLengthRule;

class ExampleCustomFormBuilder extends FormBuilder
{
    /**
     * @return MaxLengthRule
     */
    public function createMaxLengthRule(): MaxLengthRule
    {
        $maxLengthRule = $this->maxLengthRuleFactory->create();
        $maxLengthRule->setErrorMessage("custom error message - check MaxLengthRule->getErrorMessage for available variables");

        return $maxLengthRule;
    }
}