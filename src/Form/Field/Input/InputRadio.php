<?php

namespace Ironex\Form\Field\Input;

class InputRadio extends InputAbstract
{
    /**
     * @var string
     */
    protected $type = "radio";

    /**
     * @var bool
     */
    private $checked;

    /**
     * @var array choices
     */
    private $choices = [];

    /**
     * @param string $choice
     */
    public function addChoice(string $choice): void
    {
        $this->choices[] = $choice;
    }

    /**
     * @return bool
     */
    public function getChecked(): bool
    {
        return $this->checked;
    }

    /**
     * @param bool $checked
     */
    public function setChecked(bool $checked): void
    {
        $this->checked = $checked;
    }
}