<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\FieldInterface;
use Ironex\Form\Field\Rule\MatchFieldValueRule;
use Ironex\Form\Field\Rule\MatchValueRule;

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
     * @param FieldInterface $field
     */
    public function addMatchFieldValueRule(FieldInterface $field): void
    {
        $this->matchFieldValueRule->setFieldToMatch($field);
        $this->rules[] = $this->matchFieldValueRule;
    }

    /**
     * @param $value
     */
    public function addMatchValueRule($value): void
    {
        $this->matchValueRule->setValue($value);
        $this->rules[] = $this->matchValueRule;
    }

    /**
     * @param MatchFieldValueRule $matchFieldValueRule
     */
    public function setMatchFieldValueRule(MatchFieldValueRule $matchFieldValueRule): void
    {
        $this->matchFieldValueRule = $matchFieldValueRule;
    }

    /**
     * @param MatchValueRule $matchValueRule
     */
    public function setMatchValueRule(MatchValueRule $matchValueRule): void
    {
        $this->matchValueRule = $matchValueRule;
    }
}