<?php

namespace Ironex\Form\Field\Factory;

use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\RequiredRule;
use Ironex\FormBuilder;

abstract class AbstractFieldFactory
{
    /**
     * @var CustomRule
     */
    protected $customRule;

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
        $this->customRule = $formBuilder->createCustomRule();
        $this->requiredRule = $formBuilder->createRequiredRule();
    }
}