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
     */
    public function setMax(int $max): void
    {
        $this->maxValueRule->setMax($max);
        $this->addMaxValueRule();
        $this->max = $max;
    }

    /**
     * @param int $min
     */
    public function setMin(int $min): void
    {
        $this->minValueRule->setMin($min);
        $this->addMinValueRule();
        $this->min = $min;
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
     * @param mixed $value
     * @return void
     */
    public function setValue($value): void
    {
        $this->value = (int) $value;
    }

    /**
     * @return int|null
     */
    public function getMax(): ?int
    {
        return $this->max;
    }

    /**
     * @return int|null
     */
    public function getMin(): ?int
    {
        return $this->min;
    }
}