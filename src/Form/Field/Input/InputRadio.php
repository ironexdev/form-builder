<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\Input\Factory\InputRadioOptionFactory;
use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\RequiredRule;

class InputRadio extends InputAbstract
{
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
     * @param InputRadioOptionFactory $inputRadioOptionFactory
     */
    public function __construct(CustomRule $customRule, RequiredRule $requiredRule, InputRadioOptionFactory $inputRadioOptionFactory)
    {
        $this->customRule = $customRule;
        $this->requiredRule = $requiredRule;
        $this->inputRadioOptionFactory = $inputRadioOptionFactory;
    }

    /**
     * @return InputRadioOption[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param bool $checked
     * @param string $label
     * @param $value
     * @return $this
     */
    public function addOption(bool $checked, string $label, $value): self
    {
        $this->options[] = $this->inputRadioOptionFactory->create($checked, $label, $value);

        return $this;
    }
}