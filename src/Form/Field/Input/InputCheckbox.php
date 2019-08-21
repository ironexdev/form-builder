<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\Rule\Factory\CustomRuleFactory;
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
     * @param CustomRuleFactory $customRuleFactory
     * @param RequiredRule $requiredRule
     */
    public function __construct(CustomRuleFactory $customRuleFactory, RequiredRule $requiredRule)
    {
        parent::__construct($customRuleFactory, $requiredRule);
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