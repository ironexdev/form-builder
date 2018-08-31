<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\FieldAbstract;

abstract class InputAbstract extends FieldAbstract
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}