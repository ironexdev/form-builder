<?php

namespace Ironex\Form\Field\Rule;

use Ironex\Form\Field\FieldInterface;

interface RuleInterface
{
    /**
     * @return mixed
     */
    public function getConstraint();

    /**
     * @param  $field
     * @return string
     */
    public function getErrorMessage(FieldInterface $field): string;

    /**
     * @param string $errorMessage
     */
    public function setErrorMessage(string $errorMessage): void;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param $value
     * @return bool
     */
    public function test($value): bool;
}