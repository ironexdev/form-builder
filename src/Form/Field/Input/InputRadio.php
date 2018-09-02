<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\RequiredRule;

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
     * InputCheckbox constructor.
     * @param CustomRule $customRule
     * @param RequiredRule $requiredRule
     */
    public function __construct(CustomRule $customRule, RequiredRule $requiredRule)
    {
        $this->customRule = $customRule;
        $this->requiredRule = $requiredRule;
    }

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