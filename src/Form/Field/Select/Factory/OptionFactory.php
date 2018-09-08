<?php

namespace Ironex\Form\Field\Select\Factory;

use Ironex\Form\Field\Select\Option;

class OptionFactory
{
    /**
     * @return Option
     */
    public function create(): Option
    {
        return new Option();
    }
}