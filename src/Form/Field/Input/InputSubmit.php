<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\Rule\RequiredRule;

class InputSubmit extends AbstractInput
{
    /**
     * @var string
     */
    protected $type = "submit";

    /**
     * InputCheckbox constructor.
     * @param RequiredRule $requiredRule
     */
    public function __construct(RequiredRule $requiredRule)
    {
        $this->requiredRule = $requiredRule;
    }
}