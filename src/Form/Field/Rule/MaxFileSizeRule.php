<?php

namespace Ironex\Form\Field\Rule;

class MaxFileSizeRule extends AbstractRule implements RuleInterface
{
    /**
     * @var int
     */
    private $maxFileSize;

    /**
     * @return int
     */
    public function getMaxFileSize(): int
    {
        return $this->maxFileSize;
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