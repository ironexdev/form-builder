<?php

namespace Ironex\Form\Field\Rule;

use Ironex\Form\Field\FieldInterface;

class MaxFileSizeRule extends AbstractRule implements RuleInterface
{
    /**
     * @var int
     */
    private $maxFileSize;

    /**
     * @param FieldInterface $field
     * @return string
     */
    public function getErrorMessage(FieldInterface $field): string
    {
        $fieldValue = $field->getValue();
        $fieldFileSize = isset($fieldValue["size"][0]) ? array_sum($fieldValue["size"]) : $fieldValue["size"];

        return strtr($this->errorMessage, [
            "{{fieldLabel}}" => $field->getLabel(),
            "{{fieldFileSize}}" => $fieldFileSize,
            "{{maxFileSize}}" => $this->maxFileSize
        ]);
    }

    /**
     * @param int $maxFileSize (bytes)
     */
    public function setMaxFileSize(int $maxFileSize): void
    {
        $this->maxFileSize = $maxFileSize;
        $this->constraint = $maxFileSize;
    }

    /**
     * @param $value
     * @return bool
     */
    public function test($value): bool
    {
        $fieldFileSize = isset($value["size"][0]) ? array_sum($value["size"]) : $value["size"];

        return $this->maxFileSize >= $fieldFileSize;
    }
}