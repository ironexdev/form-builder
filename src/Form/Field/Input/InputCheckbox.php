<?php

namespace Ironex\Form\Field\Input;

class InputCheckbox extends InputAbstract
{
    /**
     * @var string
     */
    protected $type = "checkbox";

    /**
     * @var bool
     */
    private $value = false;

    public function setValue($value): void
    {
        $this->value = true;
    }
}