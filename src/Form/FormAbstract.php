<?php

namespace Ironex\Form;

use Ironex\Form\Field\FieldAbstract;
use Ironex\Form\Field\FieldInterface;
use Ironex\Exception\BadRequestIronException;
use Ironex\Exception\MethodNotAllowedIronException;
use Ironex\FormBuilder;
use Ironex\RequestInterface;

abstract class FormAbstract
{
    /**
     * @var string
     */
    protected $acceptCharset;

    /**
     * @var string
     */
    protected $action;

    /**
     * @var string
     */
    protected $autocomplete;

    /**
     * @var string
     */
    protected $enctype;

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
    protected $novalidate;

    /**
     * @var string
     */
    protected $target;

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
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
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

        $properties = get_object_vars($this);

        foreach ($properties as $property)
        {
            if ($property && is_subclass_of($property, FieldAbstract::class, false))
            {
                $this->fields[] = $property;
            }
        }

        return $this->fields;
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
     * @return bool
     */
    public function getNovalidate(): bool
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
        $requestBody = $request->getBody();
        $requestMethod = $request->getMethod();

        if ($this->method !== $requestMethod)
        {
            throw new MethodNotAllowedIronException();
        }

        foreach ($requestBody as $key => $value)
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
                $this->errors[] = $field->getErrors();
            }
        }

        $this->valid = $valid;
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
}