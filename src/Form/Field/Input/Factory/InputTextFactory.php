<?php

namespace Ironex\Form\Field\Input\Factory;

use Ironex\Form\Field\Input\InputText;
use Ironex\Form\Field\Rule\MatchFieldValueRule;
use Ironex\Form\Field\Rule\MatchValueRule;
use Ironex\Form\Field\Rule\MaxLengthRule;
use Ironex\Form\Field\Rule\MinLengthRule;
use Ironex\FormBuilder;

class InputTextFactory extends InputFactoryAbstract
{
    /**
     * @var MaxLengthRule
     */
    private $maxLengthRule;

    /**
     * @var MatchFieldValueRule
     */
    private $matchFieldValueRule;

    /**
     * @var MatchValueRule
     */
    private $matchValueRule;

    /**
     * @var MinLengthRule
     */
    private $minLengthRule;

    /**
     * @param FormBuilder $formBuilder
     */
    protected function init(FormBuilder $formBuilder)
    {
        parent::init($formBuilder);

        $this->matchValueRule = $formBuilder->createMatchValueRule();
        $this->matchFieldValueRule = $formBuilder->createMatchFieldValueRule();
        $this->maxLengthRule = $formBuilder->createMaxLengthRule();
        $this->minLengthRule = $formBuilder->createMinLengthRule();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return InputText
     */
    public function create(FormBuilder $formBuilder): InputText
    {
        $this->init($formBuilder);

        $inputText = new InputText();
        $inputText->setCustomRule($this->customRule);
        $inputText->setMaxLengthRule($this->maxLengthRule);
        $inputText->setMatchFieldValueRule($this->matchFieldValueRule);
        $inputText->setMatchValueRule($this->matchValueRule);
        $inputText->setMinLengthRule($this->minLengthRule);

        return $inputText;
    }
}