<?php

namespace Ironex\Form\Field\Select\Factory;

use Ironex\Form\Field\Factory\AbstractFieldFactory;
use Ironex\Form\Field\Rule\MatchEnumRule;
use Ironex\Form\Field\Select\Select;
use Ironex\FormBuilder;

class SelectFactory extends AbstractFieldFactory
{
    /**
     * @var MatchEnumRule
     */
    private $matchEnumRule;

    /**
     * @inject
     * @var OptionFactory
     */
    private $optionFactory;

    /**
     * @param FormBuilder $formBuilder
     * @return Select
     */
    public function create(FormBuilder $formBuilder): Select
    {
        $this->init($formBuilder);

        $inputText = new Select($this->customRule, $this->requiredRule, $this->matchEnumRule, $this->optionFactory);

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
    }
}