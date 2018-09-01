<?php

namespace Ironex\Example;

use Ironex\Form\Field\Input\InputSubmit;
use Ironex\Form\Field\Input\InputText;
use Ironex\Form\FormAbstract;

class ExampleForm extends FormAbstract
{
    /**
     * @var string
     */
    protected $action = "/process-example-form";

    /**
     * @inject
     * @var CustomFormBuilder
     */
    protected $customFormBuilder;

    /**
     * @var string
     */
    protected $method = "POST";

    /**
     * @var string
     */
    protected $name = "example-form";

    /**
     * @var InputText
     */
    private $email;

    /**
     * @var InputSubmit
     */
    private $submit;

    /**
     * @return void
     */
    public function init(): void
    {
        /* Email */
        $this->email = $this->customFormBuilder->createInputText("email");
        $this->email->setLabel("Email");
        $this->email->setPlaceholder("Email");
        $this->email->addMaxLengthRule(255);
        $this->email->addMinLengthRule(3);

        /* Submit */
        $this->submit = $this->customFormBuilder->createInputSubmit("submit");
        $this->submit->setLabel("Submit");
    }
}