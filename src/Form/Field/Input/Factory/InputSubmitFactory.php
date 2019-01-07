<?php

namespace Ironex\Form\Field\Input\Factory;

use Ironex\Form\Field\Input\InputSubmit;
use Ironex\FormBuilder;

class InputSubmitFactory extends AbstractInputFactory
{
    /**
     * @param FormBuilder $formBuilder
     * @return InputSubmit
     */
    public function create(FormBuilder $formBuilder): InputSubmit
    {
        $this->init($formBuilder);

        $inputSubmit = new InputSubmit($this->customRule, $this->requiredRule);

        return $inputSubmit;
    }
}