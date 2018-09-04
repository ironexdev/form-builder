<?php

namespace Ironex\Form\Field\Input\Factory;

use Ironex\Form\Field\Input\InputRadioOption;

class InputRadioOptionFactory
{
    /**
     * @param bool $checked
     * @param string $label
     * @param $value
     * @return \Ironex\Form\Field\Input\InputRadioOption
     */
    public function create(bool $checked, string $label, $value): InputRadioOption
    {
        $option = new InputRadioOption();
        $option->setChecked($checked);
        $option->setLabel($label);
        $option->setValue($value);

        return $option;
    }
}