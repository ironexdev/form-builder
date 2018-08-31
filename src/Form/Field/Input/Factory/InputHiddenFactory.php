<?php

namespace Ironex\Form\Field\Input\Factory;

use Ironex\Form\Field\Input\InputHidden;
use Ironex\Form\Field\Rule\MatchFieldValueRule;
use Ironex\Form\Field\Rule\MatchValueRule;
use Ironex\FormBuilder;

class InputHiddenFactory extends InputFactoryAbstract
{
  /**
     * @var MatchFieldValueRule
     */
    private $matchFieldValueRule;

    /**
     * @var MatchValueRule
     */
    private $matchValueRule;

    /**
     * @param FormBuilder $formBuilder
     */
    protected function init(FormBuilder $formBuilder)
    {
        parent::init($formBuilder);

        $this->matchValueRule = $formBuilder->createMatchValueRule();
        $this->matchFieldValueRule = $formBuilder->createMatchFieldValueRule();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return InputHidden
     */
    public function create(FormBuilder $formBuilder): InputHidden
    {
        $this->init($formBuilder);

        $inputHidden = new InputHidden();
        $inputHidden->setCustomRule($this->customRule);
        $inputHidden->setMatchFieldValueRule($this->matchFieldValueRule);
        $inputHidden->setMatchValueRule($this->matchValueRule);

        return $inputHidden;
    }
}