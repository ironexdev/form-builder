<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\FieldInterface;
use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\MatchEnumRule;
use Ironex\Form\Field\Rule\MatchFieldValueRule;
use Ironex\Form\Field\Rule\MaxLengthRule;
use Ironex\Form\Field\Rule\MinLengthRule;
use Ironex\Form\Field\Rule\RequiredRule;

class InputPassword extends AbstractInput
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
     * @var MaxLengthRule
     */
    protected $maxLengthRule;

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
     * @param MatchEnumRule $matchEnumRule
     * @param MatchFieldValueRule $matchFieldValueRule
     * @param MaxLengthRule $maxLengthRule
     * @param MinLengthRule $minLengthRule
     */
    public function __construct(CustomRule $customRule, RequiredRule $requiredRule, MatchEnumRule $matchEnumRule, MatchFieldValueRule $matchFieldValueRule, MaxLengthRule $maxLengthRule, MinLengthRule $minLengthRule)
    {
        $this->customRule = $customRule;
        $this->requiredRule = $requiredRule;
        $this->matchEnumRule = $matchEnumRule;
        $this->matchFieldValueRule = $matchFieldValueRule;
        $this->maxLengthRule = $maxLengthRule;
        $this->minLengthRule = $minLengthRule;
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
     * @param int $min
     * @return $this
     */
    public function setMinLength(int $min): self
    {
        $this->minLengthRule->setMinLength($min);
        $this->addMinLengthRule();
        $this->minLength = $min;

        return $this;
    }

    /**
     * @return void
     */
    private function addMinLengthRule(): void
    {
        $this->rules[$this->minLengthRule->getName()] = $this->minLengthRule;
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
     * @return $this
     */
    public function setMaxLength(int $max): self
    {
        $this->maxLengthRule->setMaxLength($max);
        $this->addMaxLengthRule();
        $this->maxLength = $max;

        return $this;
    }

    /**
     * @return void
     */
    private function addMaxLengthRule(): void
    {
        $this->rules[$this->maxLengthRule->getName()] = $this->maxLengthRule;
    }

    /**
     * @return string
     */
    public function getPlaceHolder(): string
    {
        return $this->placeHolder;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setPlaceHolder(string $value): self
    {
        $this->placeHolder = $value;

        return $this;
    }
}