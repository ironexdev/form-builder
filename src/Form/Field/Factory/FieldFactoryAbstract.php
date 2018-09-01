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
     * @return void
     */
    protected function init(FormBuilder $formBuilder): void
    {
        $this->customRule = $formBuilder->createCustomRule();
    }
}