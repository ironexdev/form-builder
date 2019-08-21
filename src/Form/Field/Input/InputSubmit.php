<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\Rule\Factory\CustomRuleFactory;
use Ironex\Form\Field\Rule\RequiredRule;

class InputSubmit extends AbstractInput
{
    /**
     * @var string
     */
    protected $type = "submit";

    /**
     * InputCheckbox constructor.
     * @param CustomRuleFactory $customRuleFactory
     * @param RequiredRule $requiredRule
     */
    public function __construct(CustomRuleFactory $customRuleFactory, RequiredRule $requiredRule)
    {
        parent::__construct($customRuleFactory, $requiredRule);
    }
}