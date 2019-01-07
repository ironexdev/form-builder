<?php

namespace Ironex\Form\Field\TextArea;

use Ironex\Form\Field\AbstractField;
use Ironex\Form\Field\FieldInterface;
use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\MaxLengthRule;
use Ironex\Form\Field\Rule\MinLengthRule;
use Ironex\Form\Field\Rule\RequiredRule;

class TextArea extends AbstractField implements FieldInterface
{
    /**
     * @var MaxLengthRule
     */
    protected $maxLengthRule;

    /**
     * @var MinLengthRule
     */
    protected $minLengthRule;

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
     * TextArea constructor.
     * @param CustomRule $customRule
     * @param RequiredRule $requiredRule
     * @param MaxLengthRule $maxLengthRule
     * @param MinLengthRule $minLengthRule
     */
    public function __construct(CustomRule $customRule, RequiredRule $requiredRule, MaxLengthRule $maxLengthRule, MinLengthRule $minLengthRule)
    {
        $this->customRule = $customRule;
        $this->requiredRule = $requiredRule;
        $this->maxLengthRule = $maxLengthRule;
        $this->minLengthRule = $minLengthRule;
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
     * @return int
     */
    public function getMinLength(): int
    {
        return $this->minLength;
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
     * @return string
     */
    public function getPlaceHolder(): string
    {
        return $this->placeHolder;
    }

    /**
     * @param string $placeHolder
     * @return $this
     */
    public function setPlaceHolder(string $placeHolder): self
    {
        $this->placeHolder = $placeHolder;

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
     * @return void
     */
    private function addMinLengthRule(): void
    {
        $this->rules[$this->minLengthRule->getName()] = $this->minLengthRule;
    }
}