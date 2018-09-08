<?php

namespace Ironex\Form\Field\Select\Factory;

use Ironex\Form\Field\Factory\FieldFactoryAbstract;
use Ironex\Form\Field\Select\Select;
use Ironex\FormBuilder;

class SelectFactory extends FieldFactoryAbstract
{
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

        $inputText = new Select($this->customRule, $this->requiredRule, $this->optionFactory);

        return $inputText;
    }
}