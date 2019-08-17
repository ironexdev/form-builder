<?php

namespace Ironex\Form\Field\Rule;

use Ironex\Form\Field\FieldInterface;

class MatchFieldValueRule extends AbstractRule implements RuleInterface
{
    /**
     * @var FieldInterface
     */
    private $fieldToMatch;

    /**
     * @param $value
     * @return bool
     */
    public function test($value): bool
    {
        return $this->fieldToMatch->getValue() == $value;
    }

    /**
     * @param FieldInterface $field
     */
    public function setFieldToMatch(FieldInterface $field): void
    {
        $this->fieldToMatch = $field;
        $this->constraint = $field->getName();
    }
}