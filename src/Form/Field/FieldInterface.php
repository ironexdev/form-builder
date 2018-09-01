<?php

namespace Ironex\Form\Field;

use Closure;
use Ironex\Form\Field\Rule\CustomRule;

interface FieldInterface
{
    /**
     * @param $closure
     * @param string $errorMessage
     * @return void
     */
    public function addCustomRule(Closure $closure, string $errorMessage): void;

    /**
     * @return bool
     */
    public function getAutofocus(): bool;

    /**
     * @param bool $autofocus
     */
    public function setAutofocus(bool $autofocus): void;

    /**
     * @return bool
     */
    public function getDisabled(): bool;

    /**
     * @param bool $disabled
     */
    public function setDisabled(bool $disabled): void;

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
     */
    public function setLabel(string $label): void;

    /**
     * @param CustomRule $customRule
     */
    public function setCustomRule(CustomRule $customRule): void;

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void;

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
     */
    public function setValue($value): void;

    /**
     * @return bool
     */
    public function getRequired(): bool;

    /**
     * @param bool $required
     */
    public function setRequired(bool $required): void;

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