<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\FieldInterface;
use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\MatchFieldValueRule;
use Ironex\Form\Field\Rule\MatchValueRule;
use Ironex\Form\Field\Rule\MaxLengthRule;
use Ironex\Form\Field\Rule\MinLengthRule;
use Ironex\Form\Field\Rule\RequiredRule;

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
     * InputCheckbox constructor.
     * @param CustomRule $customRule
     * @param RequiredRule $requiredRule
     * @param MatchFieldValueRule $matchFieldValueRule
     * @param MatchValueRule $matchValueRule
     * @param MaxLengthRule $maxLengthRule
     * @param MinLengthRule $minLengthRule
     */
    public function __construct(CustomRule $customRule, RequiredRule $requiredRule, MatchFieldValueRule $matchFieldValueRule, MatchValueRule $matchValueRule, MaxLengthRule $maxLengthRule, MinLengthRule $minLengthRule)
    {
        $this->customRule = $customRule;
        $this->requiredRule = $requiredRule;
        $this->matchFieldValueRule = $matchFieldValueRule;
        $this->matchValueRule = $matchValueRule;
        $this->maxLengthRule = $maxLengthRule;
        $this->minLengthRule = $minLengthRule;
    }

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
     * @param int $min
     * @return void
     */
    public function setMinLength(int $min): void
    {
        $this->minLengthRule->setMinLength($min);
        $this->addMinLengthRule();
        $this->minLength = $min;
    }

    /**
     * @return void
     */
    private function addMinLengthRule(): void
    {
        $this->rules[] = $this->minLengthRule;
    }

    /**
     * @return int
     */
    public function getMaxLength(): int
    {
        return $this->maxLength;
    }

    /**
     * @param int $max
     * @return void
     */
    public function setMaxLength(int $max): void
    {
        $this->maxLengthRule->setMaxLength($max);
        $this->addMaxLengthRule();
        $this->maxLength = $max;
    }

    /**
     * @return void
     */
    private function addMaxLengthRule(): void
    {
        $this->rules[] = $this->maxLengthRule;
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
}