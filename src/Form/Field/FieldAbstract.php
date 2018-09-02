<?php

namespace Ironex\Form\Field;

use Closure;
use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\RequiredRule;
use Ironex\Form\Field\Rule\RuleInterface;

abstract class FieldAbstract implements FieldInterface
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
     * @return void
     */
    private function addRequiredRule(): void
    {
        $this->rules[] = $this->requiredRule;
    }

    /**
     * @param Closure $closure
     * @param string $errorMessage
     * @return void
     */
    public function addCustomRule(Closure $closure, string $errorMessage): void
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
     * @return void
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
     * @return void
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
     * @return void
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
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
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     * @return void
     */
    public function setValue($value): void
    {
        $this->value = $value;
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
        return $this->required ? "required" : "";
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
     */
    public function setRequired(bool $required): void
    {
        $this->addRequiredRule();
        $this->required = $required;
    }
}
