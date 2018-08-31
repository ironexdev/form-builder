<?php

namespace Ironex\Form\Field;

interface FieldInterface
{
    /**
     * @return array
     */
    public function getErrors(): array;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return bool
     */
    public function getRequired(): bool;

    /**
     * @param bool $required
     */
    public function setRequired(bool $required): void;

    /**
     * @return null|string
     */
    public function getLabel(): ?string;

    /**
     * @param string $label
     */
    public function setLabel(string $label): void;

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
    public function isValid(): bool;

    /**
     * @return void
     */
    public function validate(): void;
}