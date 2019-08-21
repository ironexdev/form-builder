<?php

namespace Ironex\Form\Field\Input\Factory;

use Ironex\Form\Field\Input\InputRadio;
use Ironex\Form\Field\Rule\MatchEnumRule;
use Ironex\Form\Field\Rule\MatchValueRule;
use Ironex\FormBuilder;

class InputRadioFactory extends AbstractInputFactory
{
    /**
     * @inject
     * @var InputRadioOptionFactory
     */
    private $inputRadioOptionFactory;

    /**
     * @var MatchEnumRule
     */
    private $matchEnumRule;

    /**
     * @var MatchValueRule
     */
    private $matchValueRule;

    /**
     * @param FormBuilder $formBuilder
     * @return InputRadio
     */
    public function create(FormBuilder $formBuilder): InputRadio
    {
        $this->init($formBuilder);

        $inputRadio = new InputRadio($this->customRuleFactory, $this->requiredRule, $this->matchEnumRule, $this->matchValueRule, $this->inputRadioOptionFactory);

        return $inputRadio;
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
    }
}