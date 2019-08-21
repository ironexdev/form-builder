<?php

namespace Ironex\Form\Field\Input\Factory;

use Ironex\Form\Field\Input\InputNumber;
use Ironex\Form\Field\Rule\MatchEnumRule;
use Ironex\Form\Field\Rule\MatchFieldValueRule;
use Ironex\Form\Field\Rule\MatchValueRule;
use Ironex\Form\Field\Rule\MaxValueRule;
use Ironex\Form\Field\Rule\MinValueRule;
use Ironex\FormBuilder;

class InputNumberFactory extends AbstractInputFactory
{
    /**
     * @var MatchEnumRule
     */
    private $matchEnumRule;

    /**
     * @var MatchFieldValueRule
     */
    private $matchFieldValueRule;

    /**
     * @var MatchValueRule
     */
    private $matchValueRule;

    /**
     * @var MaxValueRule
     */
    private $maxValueRule;

    /**
     * @var MinValueRule
     */
    private $minValueRule;

    /**
     * @param FormBuilder $formBuilder
     * @return InputNumber
     */
    public function create(FormBuilder $formBuilder): InputNumber
    {
        $this->init($formBuilder);

        $inputNumber = new InputNumber($this->customRuleFactory, $this->requiredRule, $this->matchEnumRule, $this->matchFieldValueRule, $this->matchValueRule, $this->maxValueRule, $this->minValueRule);

        return $inputNumber;
    }

    /**
     * @param FormBuilder $formBuilder
     * @return void
     */
    protected function init(FormBuilder $formBuilder): void
    {
        parent::init($formBuilder);

        $this->matchEnumRule = $formBuilder->createMatchEnumRule();
        $this->matchValueRule = $formBuilder->createMatchValueRule();
        $this->matchFieldValueRule = $formBuilder->createMatchFieldValueRule();
        $this->maxValueRule = $formBuilder->createMaxValueRule();
        $this->minValueRule = $formBuilder->createMinValueRule();
    }
}