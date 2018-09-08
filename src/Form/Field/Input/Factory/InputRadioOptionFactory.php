<?php

namespace Ironex\Form\Field\Input\Factory;

use Ironex\Form\Field\Input\InputRadioOption;

class InputRadioOptionFactory
{
    /**
     * @return InputRadioOption
     */
    public function create(): InputRadioOption
    {
        return new InputRadioOption();
    }
}