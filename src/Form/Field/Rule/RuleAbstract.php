<?php

namespace Ironex\Form\Field\Rule;

use Ironex\Form\Field\FieldInterface;
use ReflectionClass;
use ReflectionException;

abstract class RuleAbstract implements RuleInterface
{
    /**
     * @var mixed
     */
    protected $constraint;

    /**
     * @var string
     */
    protected $errorMessage;

    /**
     * @var string
     */
    private $name;

    public function __construct()
    {
        try
        {
            $reflection = new ReflectionClass($this);
            $this->name = $reflection->getShortName();
        }
        catch (ReflectionException $e)
        {
            trigger_error("Reflection error - " . $e->getMessage() . " in <b>" . $e->getFile() . "</b> on " . $e->getLine() . " | triggered by catching ReflectionException ", E_USER_ERROR);
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
     * @param FieldInterface $field
     * @return string
     */
    public function getErrorMessage(FieldInterface $field): string
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     */
    public function setErrorMessage(string $errorMessage): void
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}