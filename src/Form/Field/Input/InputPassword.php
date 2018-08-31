<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\FieldInterface;
use Ironex\Form\Field\Rule\MatchFieldValueRule;
use Ironex\Form\Field\Rule\MatchValueRule;
use Ironex\Form\Field\Rule\MaxLengthRule;
use Ironex\Form\Field\Rule\MinLengthRule;

class InputPassword extends InputAbstract
{
    /**
     * @var MaxLengthRule
     */
    protected $maxLengthRule;

    /**
     * @var MatchFieldValueRule
     */
    protected $matchFieldValueRule;

    /**
     * @var MatchValueRule
     */
    protected $matchValueRule;

    /**
     * @var MinLengthRule
     */
    protected $minLengthRule;

    /**
     * @var string
     */
    protected $type = "password";

    /**
     * @var int
     */
    private $maxLength;

    /**
     * @var int
     */
    private $minLength;

    /**
     * @var string
     */
    private $placeHolder;

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
     * @param int $max
     * @return void
     */
    public function addMaxLengthRule(int $max): void
    {
        $this->maxLengthRule->setMaxLength($max);
        $this->rules[] = $this->maxLengthRule;
        $this->maxLength = $max;
    }

    /**
     * @param int $min
     * @return void
     */
    public function addMinLengthRule(int $min): void
    {
        $this->minLengthRule->setMinLength($min);
        $this->rules[] = $this->minLengthRule;
        $this->minLength = $min;
    }

    /**
     * @return int
     */
    public function getMaxLength(): int
    {
        return $this->maxLength;
    }

    /**
     * @return string
     */
    public function getPlaceHolder(): string
    {
        return $this->placeHolder;
    }

    /**
     * @param mixed $value
     * @return void
     */
    public function setPlaceHolder($value): void
    {
        $this->placeHolder = $value;
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