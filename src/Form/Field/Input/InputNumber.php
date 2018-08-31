<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\FieldInterface;
use Ironex\Form\Field\Rule\MatchFieldValueRule;
use Ironex\Form\Field\Rule\MatchValueRule;
use Ironex\Form\Field\Rule\MaxValueRule;
use Ironex\Form\Field\Rule\MinValueRule;

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
    public function addMaxValueRule(int $max): void
    {
        $this->maxValueRule->setMax($max);
        $this->rules[] = $this->maxValueRule;
        $this->max = $max;
    }

    /**
     * @param int $min
     * @return void
     */
    public function addMinValueRule(int $min): void
    {
        $this->minValueRule->setMin($min);
        $this->rules[] = $this->minValueRule;
        $this->min = $min;
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

    /**
     * @param MaxValueRule $maxValueRule
     */
    public function setMaxValueRule(MaxValueRule $maxValueRule): void
    {
        $this->maxValueRule = $maxValueRule;
    }

    /**
     * @param MinValueRule $minValueRule
     */
    public function setMinValueRule(MinValueRule $minValueRule): void
    {
        $this->minValueRule = $minValueRule;
    }
}