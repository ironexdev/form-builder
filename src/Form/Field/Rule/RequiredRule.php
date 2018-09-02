<?php

namespace Ironex\Form\Field\Rule;

use Ironex\Form\Field\FieldInterface;

class RequiredRule extends RuleAbstract implements RuleInterface
{
    /**
     * @var mixed
     */
    protected $constraint = true;

    /**
     * @param FieldInterface $field
     * @return string
     */
    public function getErrorMessage(FieldInterface $field): string
    {
        return strtr($this->errorMessage, [
            "{{fieldLabel}}" => $field->getLabel()
        ]);
    }

    /**
     * @param $value
     * @return bool
     */
    public function test($value): bool
    {
        return $value ? true : false;
    }
}