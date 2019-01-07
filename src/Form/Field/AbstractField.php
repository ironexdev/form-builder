<?php

namespace Ironex\Form\Field;

use Closure;
use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\RequiredRule;
use Ironex\Form\Field\Rule\RuleInterface;

abstract class AbstractField implements FieldInterface
{
    /**
     * @var CustomRule
     */
    protected $customRule;

    /**
     * @var RequiredRule
     */
    protected $requiredRule;

    /**
     * @var RuleInterface[]
     */
    protected $rules = [];

    /**
     * @var mixed
     */
    protected $value;

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
     * @return $this
     */
    private function addRequiredRule() // : $this
    {
        $this->rules[$this->requiredRule->getName()] = $this->requiredRule;

        return $this;
    }

    /**
     * @param Closure $closure
     * @param string $errorMessage
     * @return $this
     */
    public function addCustomRule(Closure $closure, string $errorMessage) // : $this
    {
        $this->customRule->setClosure($closure);
        $this->customRule->setErrorMessage($errorMessage);
        $this->rules[$this->customRule->getName()] = $this->customRule;

        return $this;
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
     * @return $this
     */
    public function setAutofocus(bool $autofocus) // : $this
    {
        $this->autofocus = $autofocus;

        return $this;
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
     * @return $this
     */
    public function setDisabled(bool $disabled) // : $this
    {
        $this->disabled = $disabled;

        return $this;
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
     * @return $this
     */
    public function setLabel(string $label) // : $this
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name) // : $this
    {
        $this->name = $name;

        return $this;
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
     * @return $this
     */
    public function setValue($value) // : $this
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getRulesJson(): string
    {
        $rules = [];

        foreach ($this->rules as $ruleName => $rule)
        {
            $rules[$ruleName] = $rule->getConstraint();
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

        if (!$this->isRequired() && !$this->value)
        {
            $this->valid = $valid;

            return;
        }

        foreach ($this->rules as $rule)
        {
            if (!$rule->test($this->value))
            {
                $valid = false;
                $this->errors[$rule->getName()] = $rule->getErrorMessage($this);
            }
        }

        $this->valid = $valid;
    }

    /**
     * @return RequiredRule|null
     */
    public function getRequiredRule(): ?RequiredRule
    {
        return $this->requiredRule;
    }

    /**
     * @return string
     */
    public function getRequired(): string
    {
        return $this->isRequired() ? "required" : "";
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     * @return $this
     */
    public function setRequired(bool $required): self
    {
        $this->addRequiredRule();
        $this->required = $required;

        return $this;
    }
}
