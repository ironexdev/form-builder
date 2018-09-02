<?php

namespace Ironex\Form\Field\Input\Factory;

use Ironex\Form\Field\Input\InputNumber;
use Ironex\Form\Field\Rule\MatchFieldValueRule;
use Ironex\Form\Field\Rule\MatchValueRule;
use Ironex\Form\Field\Rule\MaxValueRule;
use Ironex\Form\Field\Rule\MinValueRule;
use Ironex\FormBuilder;

class InputNumberFactory extends InputFactoryAbstract
{
    /**
     * @var MaxValueRule
     */
    private $maxValueRule;

    /**
     * @var MatchFieldValueRule
     */
    private $matchFieldValueRule;

    /**
     * @var MatchValueRule
     */
    private $matchValueRule;

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

        $inputNumber = new InputNumber($this->customRule, $this->requiredRule, $this->matchFieldValueRule, $this->matchValueRule, $this->maxValueRule, $this->minValueRule);

        return $inputNumber;
    }

    /**
     * @param FormBuilder $formBuilder
     * @return void
     */
    protected function init(FormBuilder $formBuilder): void
    {
        parent::init($formBuilder);

        $this->matchValueRule = $formBuilder->createMatchValueRule();
        $this->matchFieldValueRule = $formBuilder->createMatchFieldValueRule();
        $this->maxValueRule = $formBuilder->createMaxValueRule();
        $this->minValueRule = $formBuilder->createMinValueRule();
    }
}