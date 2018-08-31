<?php

namespace Ironex;

use Ironex\Form\Field\Input\InputText;
use Ironex\Form\FormAbstract;

class ExampleForm extends FormAbstract
{
    /**
     * @inject
     * @var ExampleCustomFormBuilder
     */
    protected $exampleCustomFormBuilder;

    /**
     * @var InputText
     */
    private $email;

    public function init()
    {
        $this->email = $this->exampleCustomFormBuilder->createInputText("email");
        $this->email->addMaxLengthRule(255);

        var_dump($this);
    }
}