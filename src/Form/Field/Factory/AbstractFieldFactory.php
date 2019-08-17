<?php

namespace Ironex\Form\Field\Factory;

use Ironex\Form\Field\Rule\RequiredRule;
use Ironex\FormBuilder;

abstract class AbstractFieldFactory
{
    /**
     * @var RequiredRule
     */
    protected $requiredRule;

    /**
     * @param FormBuilder $formBuilder
     * @return void
     */
    protected function init(FormBuilder $formBuilder): void
    {
        $this->requiredRule = $formBuilder->createRequiredRule();
    }
}