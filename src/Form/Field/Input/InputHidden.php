<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\FieldInterface;
use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\MatchEnumRule;
use Ironex\Form\Field\Rule\MatchFieldValueRule;
use Ironex\Form\Field\Rule\MatchValueRule;
use Ironex\Form\Field\Rule\RequiredRule;

class InputHidden extends AbstractInput
{
    /**
     * @var MatchEnumRule
     */
    protected $matchEnumRule;

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
     * @param MatchEnumRule $matchEnumRule
     * @param MatchFieldValueRule $matchFieldValueRule
     * @param MatchValueRule $matchValueRule
     */
    public function __construct(CustomRule $customRule, RequiredRule $requiredRule, MatchEnumRule $matchEnumRule, MatchFieldValueRule $matchFieldValueRule, MatchValueRule $matchValueRule)
    {
        $this->customRule = $customRule;
        $this->requiredRule = $requiredRule;
        $this->matchEnumRule = $matchEnumRule;
        $this->matchFieldValueRule = $matchFieldValueRule;
        $this->matchValueRule = $matchValueRule;
    }

    /**
     * @param array $enum
     * @return $this
     */
    public function addMatchEnumRule(array $enum): self
    {
        $this->matchEnumRule->setEnum($enum);
        $this->rules[$this->matchEnumRule->getName()] = $this->matchEnumRule;

        return $this;
    }

    /**
     * @param FieldInterface $field
     * @return $this
     */
    public function addMatchFieldValueRule(FieldInterface $field): self
    {
        $this->matchFieldValueRule->setFieldToMatch($field);
        $this->rules[$this->matchFieldValueRule->getName()] = $this->matchFieldValueRule;

        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function addMatchValueRule($value): self
    {
        $this->matchValueRule->setValue($value);
        $this->rules[$this->matchValueRule->getName()] = $this->matchValueRule;

        return $this;
    }
}