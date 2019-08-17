<?php

namespace Ironex\Form\Field\Rule;

use Error;
use ReflectionClass;
use ReflectionException;

abstract class AbstractRule implements RuleInterface
{
    /**
     * @var mixed
     */
    protected $constraint;

    /**
     * @var string
     */
    protected $name;

    public function __construct()
    {
        try
        {
            $reflection = new ReflectionClass($this);
            $this->name = $reflection->getShortName();
        }
        catch (ReflectionException $e)
        {
            throw new Error($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @return mixed
     */
    public function getConstraint()
    {
        return $this->constraint;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}