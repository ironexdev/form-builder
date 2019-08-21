<?php

namespace Ironex\Form\Field\Input\Factory;

use Ironex\Form\Field\Input\InputCheckbox;
use Ironex\FormBuilder;

class InputCheckboxFactory extends AbstractInputFactory
{
    /**
     * @param FormBuilder $formBuilder
     * @return InputCheckbox
     */
    public function create(FormBuilder $formBuilder): InputCheckbox
    {
        $this->init($formBuilder);

        $inputCheckbox = new InputCheckbox($this->customRuleFactory, $this->requiredRule);

        return $inputCheckbox;
    }
}