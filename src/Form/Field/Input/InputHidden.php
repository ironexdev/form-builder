<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\FieldInterface;
use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\MatchFieldValueRule;
use Ironex\Form\Field\Rule\MatchValueRule;
use Ironex\Form\Field\Rule\RequiredRule;

class InputHidden extends InputAbstract
{
    /**
     * @var MatchFieldValueRule
     */
    protected $matchFieldValueRule;

    /**
     * @var MatchValueRule
     */
    protected $matchValueRule;

    /**
     * @var string
     */
    protected $type = "hidden";

    /**
     * InputCheckbox constructor.
     * @param CustomRule $customRule
     * @param RequiredRule $requiredRule
     * @param MatchFieldValueRule $matchFieldValueRule
     * @param MatchValueRule $matchValueRule
     */
    public function __construct(CustomRule $customRule, RequiredRule $requiredRule, MatchFieldValueRule $matchFieldValueRule, MatchValueRule $matchValueRule)
    {
        $this->customRule = $customRule;
        $this->requiredRule = $requiredRule;
        $this->matchFieldValueRule = $matchFieldValueRule;
        $this->matchValueRule = $matchValueRule;
    }

    /**
     * @param FieldInterface $field
     * @return $this
     */
    public function addMatchFieldValueRule(FieldInterface $field): self
    {
        $this->matchFieldValueRule->setFieldToMatch($field);
        $this->rules[] = $this->matchFieldValueRule;

        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function addMatchValueRule($value): self
    {
        $this->matchValueRule->setValue($value);
        $this->rules[] = $this->matchValueRule;

        return $this;
    }
}