<?php

namespace Ironex\Form\Field\Input;

class InputRadioOption
{
    /**
     * @var bool
     */
    private $checked;

    /**
     * @var string
     */
    private $label;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setValue($value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return $this
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return bool
     */
    public function isChecked(): bool
    {
        return $this->checked;
    }

    /**
     * @return string
     */
    public function getChecked(): string
    {
        return $this->isChecked() ? "checked" : "";
    }

    /**
     * @param bool $checked
     * @return $this
     */
    public function setChecked(bool $checked): self
    {
        $this->checked = $checked;

        return $this;
    }
}