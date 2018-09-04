<?php

namespace Ironex\Form\Field;

use Closure;
use Ironex\Form\Field\Rule\RequiredRule;

interface FieldInterface
{
    /**
     * @param $closure
     * @param string $errorMessage
     * @return $this
     */
    public function addCustomRule(Closure $closure, string $errorMessage); // : $this

    /**
     * @return bool
     */
    public function getAutofocus(): bool;

    /**
     * @param bool $autofocus
     * @return $this
     */
    public function setAutofocus(bool $autofocus); // : $this

    /**
     * @return bool
     */
    public function getDisabled(): bool;

    /**
     * @param bool $disabled
     * @return $this
     */
    public function setDisabled(bool $disabled); // : $this

    /**
     * @return array
     */
    public function getErrors(): array;

    /**
     * @return null|string
     */
    public function getLabel(): ?string;

    /**
     * @param string $label
     * @return $this
     */
    public function setLabel(string $label); // : $this

    /**
     * @return RequiredRule|null
     */
    public function getRequiredRule(): ?RequiredRule;

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name); // : $this

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @param mixed $value
     * @return $this
     */
    public function setValue($value); // : $this

    /**
     * @return string
     */
    public function getRulesJson(): string;

    /**
     * @return bool
     */
    public function isValid(): bool;

    /**
     * @return void
     */
    public function validate(): void;
}