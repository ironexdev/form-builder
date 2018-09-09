<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\Input\Factory\InputRadioOptionFactory;
use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\MatchEnumRule;
use Ironex\Form\Field\Rule\RequiredRule;

class InputRadio extends InputAbstract
{
    /**
     * @var MatchEnumRule
     */
    protected $matchEnumRule;

    /**
     * @var string
     */
    protected $type = "radio";

    /**
     * @var InputRadioOptionFactory
     */
    private $inputRadioOptionFactory;

    /**
     * @var InputRadioOption[]
     */
    private $options = [];

    /**
     * InputRadio constructor.
     * @param CustomRule $customRule
     * @param RequiredRule $requiredRule
     * @param MatchEnumRule $matchEnumRule
     * @param InputRadioOptionFactory $inputRadioOptionFactory
     */
    public function __construct(CustomRule $customRule, RequiredRule $requiredRule, MatchEnumRule $matchEnumRule, InputRadioOptionFactory $inputRadioOptionFactory)
    {
        $this->customRule = $customRule;
        $this->requiredRule = $requiredRule;
        $this->matchEnumRule = $matchEnumRule;
        $this->inputRadioOptionFactory = $inputRadioOptionFactory;
    }

    /**
     * @param bool $checked
     * @param string $label
     * @param $value
     * @return $this
     */
    public function addOption(bool $checked, string $label, $value): self
    {
        $option = $this->inputRadioOptionFactory->create();
        $option->setChecked($checked);
        $option->setLabel($label);
        $option->setValue($value);

        $this->options[] = $option;

        $this->matchEnumRule->addValue($value);
        $this->addMatchEnumRule();

        return $this;
    }

    /**
     * @return InputRadioOption[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return void
     */
    private function addMatchEnumRule(): void
    {
        $this->rules[$this->matchEnumRule->getName()] = $this->matchEnumRule;
    }
}