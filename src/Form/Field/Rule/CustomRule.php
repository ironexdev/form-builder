<?php

namespace Ironex\Form\Field\Rule;

use Closure;

class CustomRule extends RuleAbstract implements RuleInterface
{
    /**
     * @var Closure
     */
    private $closure;

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

    private function __clone()
    {
    }
}