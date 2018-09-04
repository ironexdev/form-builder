<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\RequiredRule;

class InputCheckbox extends InputAbstract
{
    /**
     * @var string
     */
    protected $type = "checkbox";

    /**
     * @var bool
     */
    protected $value = false;

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
     * @param mixed $value
     * @return $this
     */
    public function setValue($value): self
    {
        $this->value = true;

        return $this;
    }
}