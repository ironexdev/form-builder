<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\RequiredRule;

class InputSubmit extends AbstractInput
{
    /**
     * @var string
     */
    protected $type = "submit";

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
}