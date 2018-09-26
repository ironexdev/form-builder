<?php

namespace Ironex\Form;

use Ironex\Form\Field\FieldInterface;
use Ironex\Exception\BadRequestIronException;
use Ironex\Exception\MethodNotAllowedIronException;
use Ironex\FormBuilder;
use Ironex\RequestInterface;
use ReflectionClass;
use ReflectionException;

abstract class FormAbstract
{
    /**
     * @var string
     */
    protected $acceptCharset = "UNKNOWN";

    /**
     * @var string
     */
    protected $action;

    /**
     * @var string
     */
    protected $autocomplete = "on";

    /**
     * @var string
     */
    protected $enctype = "application/x-www-form-urlencoded";

    /**
     * @inject
     * @var FormBuilder
     */
    protected $formBuilder;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $novalidate = false;

    /**
     * @var string
     */
    protected $target = "_self";

    /**
     * @var array
     */
    private $errors = [];

    /**
     * @var array
     */
    private $fields = [];

    /**
     * @var bool
     */
    private $valid;

    /**
     * @return void
     */
    abstract public function init(): void;

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * @param RequestInterface $request
     * @throws BadRequestIronException
     * @throws MethodNotAllowedIronException
     */
    public function setValues(RequestInterface $request): void
    {
        $requestParameters = $request->getBody() ?: $request->getQuery();
        $requestMethod = $request->getMethod();

        if ($this->method !== $requestMethod)
        {
            throw new MethodNotAllowedIronException();
        }

        foreach ($requestParameters as $key => $value)
        {
            $field = $this->getFieldByName($key);

            if (!$field)
            {
                throw new BadRequestIronException();
            }

            $field->setValue($value);
        }
    }

    /**
     * @param string $value
     * @return FieldInterface|null
     */
    private function getFieldByName(string $value): ?FieldInterface
    {
        foreach ($this->getFields() as $field)
        {
            if ($value === $field->getName())
            {
                return $field;
            }
        }

        return null;
    }

    /**
     * @return FieldInterface[]
     */
    public function getFields(): array
    {
        if ($this->fields)
        {
            return $this->fields;
        }

        try
        {
            $reflection = new ReflectionClass($this);
            $properties = $reflection->getProperties();

            foreach ($properties as $property)
            {
                $property->setAccessible(true);
                $propertyValue = $property->getValue($this);
                $property->setAccessible(false);

                if ($propertyValue instanceof FieldInterface)
                {
                    $this->fields[] = $propertyValue;
                }
            }
        }
        catch (ReflectionException $e)
        {
            trigger_error("Reflection error - " . $e->getMessage() . " in <b>" . $e->getFile() . "</b> on " . $e->getLine() . " | triggered by catching ReflectionException ", E_USER_ERROR);
        }

        return $this->fields;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $array = [
            "acceptCharset" => $this->getAcceptCharset(),
            "action" => $this->getAction(),
            "autocomplete" => $this->getAutocomplete(),
            "enctype" => $this->getEnctype(),
            "method" => $this->getMethod(),
            "name" => $this->getName(),
            "novalidate" => $this->getNovalidate(),
            "target" => $this->getTarget()
        ];

        foreach ($this->getFields() as $field)
        {
            $array["fields"][$field->getName()] = $field;
        }

        return $array;
    }

    /**
     * @return string
     */
    public function getAcceptCharset(): string
    {
        return $this->acceptCharset;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getAutocomplete(): string
    {
        return $this->autocomplete;
    }

    /**
     * @return string
     */
    public function getEnctype(): string
    {
        return $this->enctype;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNovalidate(): string
    {
        return $this->novalidate ? "novalidate" : "";
    }

    /**
     * @return bool
     */
    public function isNovalidate(): bool
    {
        return $this->novalidate;
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * @return void
     */
    public function validate(): void
    {
        $valid = true;

        foreach ($this->getFields() as $field)
        {
            $field->validate();

            if (!$field->isValid())
            {
                $valid = false;
                $this->errors[$field->getName()] = $field->getErrors();
            }
        }

        $this->valid = $valid;
    }
}