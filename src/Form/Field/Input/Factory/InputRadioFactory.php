<?php

namespace Ironex\Form\Field\Input\Factory;

use Ironex\Form\Field\Input\InputRadio;
use Ironex\FormBuilder;

class InputRadioFactory extends InputFactoryAbstract
{
    /**
     * @inject
     * @var InputRadioOptionFactory
     */
    private $inputRadioOptionFactory;

    /**
     * @param FormBuilder $formBuilder
     * @return InputRadio
     */
    public function create(FormBuilder $formBuilder): InputRadio
    {
        $this->init($formBuilder);

        $inputRadio = new InputRadio($this->customRule, $this->requiredRule, $this->inputRadioOptionFactory);

        return $inputRadio;
    }
}