<?php

namespace Ironex\Form\Field\Factory;

use DI\Annotation\Inject;
use Ironex\Form\Field\Rule\Factory\CustomRuleFactory;
use Ironex\Form\Field\Rule\RequiredRule;
use Ironex\FormBuilder;

abstract class AbstractFieldFactory
{
    /**
     * @Inject
     * @var CustomRuleFactory
     */
    protected $customRuleFactory;

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