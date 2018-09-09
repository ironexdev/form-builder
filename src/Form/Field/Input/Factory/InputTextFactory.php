<?php

namespace Ironex\Form\Field\Input\Factory;

use Ironex\Form\Field\Input\InputText;
use Ironex\Form\Field\Rule\MatchEnumRule;
use Ironex\Form\Field\Rule\MatchFieldValueRule;
use Ironex\Form\Field\Rule\MatchValueRule;
use Ironex\Form\Field\Rule\MaxLengthRule;
use Ironex\Form\Field\Rule\MinLengthRule;
use Ironex\FormBuilder;

class InputTextFactory extends InputFactoryAbstract
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
     * @var MaxLengthRule
     */
    private $maxLengthRule;

    /**
     * @var MinLengthRule
     */
    private $minLengthRule;

    /**
     * @param FormBuilder $formBuilder
     * @return InputText
     */
    public function create(FormBuilder $formBuilder): InputText
    {
        $this->init($formBuilder);

        $inputText = new InputText($this->customRule, $this->requiredRule, $this->matchEnumRule, $this->matchFieldValueRule, $this->matchValueRule, $this->maxLengthRule, $this->minLengthRule);

        return $inputText;
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
        $this->maxLengthRule = $formBuilder->createMaxLengthRule();
        $this->minLengthRule = $formBuilder->createMinLengthRule();
    }
}