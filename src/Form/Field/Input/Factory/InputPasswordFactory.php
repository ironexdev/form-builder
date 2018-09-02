<?php

namespace Ironex\Form\Field\Input\Factory;

use Ironex\Form\Field\Input\InputPassword;
use Ironex\Form\Field\Rule\MatchFieldValueRule;
use Ironex\Form\Field\Rule\MatchValueRule;
use Ironex\Form\Field\Rule\MaxLengthRule;
use Ironex\Form\Field\Rule\MinLengthRule;
use Ironex\FormBuilder;

class InputPasswordFactory extends InputFactoryAbstract
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
     * @return InputPassword
     */
    public function create(FormBuilder $formBuilder): InputPassword
    {
        $this->init($formBuilder);

        $inputPassword = new InputPassword($this->customRule, $this->requiredRule, $this->matchFieldValueRule, $this->matchValueRule, $this->maxLengthRule, $this->minLengthRule);

        return $inputPassword;
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
        $this->maxLengthRule = $formBuilder->createMaxLengthRule();
        $this->minLengthRule = $formBuilder->createMinLengthRule();
    }
}