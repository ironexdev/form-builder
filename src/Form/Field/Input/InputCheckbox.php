<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\Rule\RequiredRule;

class InputCheckbox extends AbstractInput
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
     * @param RequiredRule $requiredRule
     */
    public function __construct(RequiredRule $requiredRule)
    {
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