<?php

namespace Ironex\Form\Field;

use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\RuleInterface;

abstract class FieldAbstract implements FieldInterface
{
    /**
     * @var CustomRule
     */
    protected $customRule;

    /**
     * @var RuleInterface[]
     */
    protected $rules = [];

    /**
     * @var bool
     */
    private $autofocus;

    /**
     * @var bool
     */
    private $disabled;

    /**
     * @var array
     */
    private $errors = [];

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $required = false;

    /**
     * @var bool
     */
    private $valid;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @param $closure
     * @param string $errorMessage
     * @return void
     */
    public function addCustomRule($closure, string $errorMessage): void
    {
        $this->customRule->setClosure($closure);
        $this->customRule->setErrorMessage($errorMessage);
        $this->rules[] = $this->customRule;
    }

    /**
     * @return bool
     */
    public function getAutofocus(): bool
    {
        return $this->autofocus;
    }

    /**
     * @param bool $autofocus
     */
    public function setAutofocus(bool $autofocus): void
    {
        $this->autofocus = $autofocus;
    }

    /**
     * @return bool
     */
    public function getDisabled(): bool
    {
        return $this->disabled;
    }

    /**
     * @param bool $disabled
     */
    public function setDisabled(bool $disabled): void
    {
        $this->disabled = $disabled;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @return null|string
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @param CustomRule $customRule
     */
    public function setCustomRule(CustomRule $customRule): void
    {
        $this->customRule = $customRule;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return bool
     */
    public function getRequired(): bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     */
    public function setRequired(bool $required): void
    {
        $this->required = $required;
    }

    /**
     * @return string
     */
    public function getRulesJson(): string
    {
        $rules = [];

        foreach ($this->rules as $rule)
        {
            $rules[$rule->getName()] = $rule->getConstraint();
        }

        return json_encode($rules);
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * @return void
     */
    public function validate(): void
    {
        $valid = true;

        if (!$this->getRequired() && !$this->value)
        {
            $this->valid = $valid;

            return;
        }

        foreach ($this->rules as $rule)
        {
            if (!$rule->test($this->value))
            {
                $valid = false;
                $this->errors[] = [
                    $this->name => $rule->getErrorMessage($this)
                ];
            }
        }

        $this->valid = $valid;
    }
}
