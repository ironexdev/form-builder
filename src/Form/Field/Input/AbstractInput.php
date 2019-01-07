<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\AbstractField;

abstract class AbstractInput extends AbstractField
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