<?php

namespace Ironex\Form\Field\Input\Factory;

use Ironex\Form\Field\Input\InputCheckbox;
use Ironex\FormBuilder;

class InputCheckboxFactory extends InputFactoryAbstract
{
    /**
     * @param FormBuilder $formBuilder
     * @return InputCheckbox
     */
    public function create(FormBuilder $formBuilder): InputCheckbox
    {
        $this->init($formBuilder);

        $inputCheckbox = new InputCheckbox();
        $inputCheckbox->setCustomRule($this->customRule);

        return $inputCheckbox;
    }
}