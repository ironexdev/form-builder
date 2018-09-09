<?php

namespace Ironex\Form\Field\Rule;

use Closure;
use Ironex\Form\Field\FieldInterface;

class CustomRule extends RuleAbstract implements RuleInterface
{
    /**
     * @var Closure
     */
    private $closure;

    /**
     * @param FieldInterface $field
     * @return string
     */
    public function getErrorMessage(FieldInterface $field): string
    {
        return strtr($this->errorMessage, [
            "{{fieldValue}}" => $field->getValue()
        ]);
    }

    /**
     * @param Closure $closure
     */
    public function setClosure(Closure $closure): void
    {
        $this->closure = $closure;
    }

    /**
     * @param $value
     * @return bool
     */
    public function test($value): bool
    {
        $closure = $this->closure;

        return $closure($value);
    }
}