<?php

namespace Ironex\Form\Field\TextArea\Factory;

use Ironex\Form\Field\Factory\AbstractFieldFactory;
use Ironex\Form\Field\Rule\MaxLengthRule;
use Ironex\Form\Field\Rule\MinLengthRule;
use Ironex\Form\Field\TextArea\TextArea;
use Ironex\FormBuilder;

class TextAreaFactory extends AbstractFieldFactory
{
    /**
     * @var MaxLengthRule
     */
    private $maxLengthRule;

    /**
     * @var MinLengthRule
     */
    private $minLengthRule;

    /**
     * @param FormBuilder $formBuilder
     * @return TextArea
     */
    public function create(FormBuilder $formBuilder): TextArea
    {
        $this->init($formBuilder);

        $textArea = new TextArea($this->customRuleFactory, $this->requiredRule, $this->maxLengthRule, $this->minLengthRule);

        return $textArea;
    }

    /**
     * @param FormBuilder $formBuilder
     * @return void
     */
    protected function init(FormBuilder $formBuilder): void
    {
        parent::init($formBuilder);

        $this->maxLengthRule = $formBuilder->createMaxLengthRule();
        $this->minLengthRule = $formBuilder->createMinLengthRule();
    }
}