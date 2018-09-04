<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\FieldInterface;
use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\MatchFieldValueRule;
use Ironex\Form\Field\Rule\MatchValueRule;
use Ironex\Form\Field\Rule\MaxValueRule;
use Ironex\Form\Field\Rule\MinValueRule;
use Ironex\Form\Field\Rule\RequiredRule;

class InputNumber extends InputAbstract
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
     * @var MaxValueRule
     */
    protected $maxValueRule;

    /**
     * @var MinValueRule
     */
    protected $minValueRule;

    /**
     * @var string
     */
    protected $type = "number";

    /**
     * @var int
     */
    private $max;

    /**
     * @var int
     */
    private $min;

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
     * @param MaxValueRule $maxValueRule
     * @param MinValueRule $minValueRule
     */
    public function __construct(CustomRule $customRule, RequiredRule $requiredRule, MatchFieldValueRule $matchFieldValueRule, MatchValueRule $matchValueRule, MaxValueRule $maxValueRule, MinValueRule $minValueRule)
    {
        $this->customRule = $customRule;
        $this->requiredRule = $requiredRule;
        $this->matchFieldValueRule = $matchFieldValueRule;
        $this->matchValueRule = $matchValueRule;
        $this->maxValueRule = $maxValueRule;
        $this->minValueRule = $minValueRule;
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

    /**
     * @param mixed $value
     * @return $this
     */
    public function setValue($value): self
    {
        $this->value = (int) $value;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMax(): ?int
    {
        return $this->max;
    }

    /**
     * @param int $max
     * @return $this
     */
    public function setMax(int $max): self
    {
        $this->maxValueRule->setMax($max);
        $this->addMaxValueRule();
        $this->max = $max;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMin(): ?int
    {
        return $this->min;
    }

    /**
     * @param int $min
     * @return $this
     */
    public function setMin(int $min): self
    {
        $this->minValueRule->setMin($min);
        $this->addMinValueRule();
        $this->min = $min;

        return $this;
    }

    /**
     * @return void
     */
    private function addMaxValueRule(): void
    {
        $this->rules[] = $this->maxValueRule;
    }

    /**
     * @return void
     */
    private function addMinValueRule(): void
    {
        $this->rules[] = $this->minValueRule;
    }
}