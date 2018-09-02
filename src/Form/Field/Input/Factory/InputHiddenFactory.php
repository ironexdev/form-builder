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
     * @return InputHidden
     */
    public function create(FormBuilder $formBuilder): InputHidden
    {
        $this->init($formBuilder);

        $inputHidden = new InputHidden($this->customRule, $this->requiredRule, $this->matchFieldValueRule, $this->matchValueRule);

        return $inputHidden;
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
    }
}