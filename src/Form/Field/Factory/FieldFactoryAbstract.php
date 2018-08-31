<?php

namespace Ironex\Form\Field\Factory;

use Ironex\Form\Field\Rule\CustomRule;
use Ironex\FormBuilder;

abstract class FieldFactoryAbstract
{
    /**
     * @var CustomRule
     */
    protected $customRule;

    /**
     * @param FormBuilder $formBuilder
     */
    protected function init(FormBuilder $formBuilder)
    {
        $this->customRule = $formBuilder->createCustomRule();
    }
}