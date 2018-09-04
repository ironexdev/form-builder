<?php

namespace Ironex\Example;

use Ironex\Form\Field\Input\InputCheckbox;
use Ironex\Form\Field\Input\InputFile;
use Ironex\Form\Field\Input\InputHidden;
use Ironex\Form\Field\Input\InputNumber;
use Ironex\Form\Field\Input\InputPassword;
use Ironex\Form\Field\Input\InputRadio;
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
    protected $enctype = "multipart/form-data";

    /**
     * @var string
     */
    protected $method = "POST";

    /**
     * @var bool
     */
    protected $novalidate = true;

    /**
     * @var string
     */
    protected $name = "example-form";

    /**
     * @var InputHidden
     */
    private $csrfToken;

    /**
     * @var InputText
     */
    private $email;

    /**
     * @var InputFile
     */
    private $photo;

    /**
     * @var InputPassword
     */
    private $password;

    /**
     * @var InputPassword
     */
    private $passwordRepeat;

    /**
     * @var InputRadio
     */
    private $plan;

    /**
     * @var InputSubmit
     */
    private $submit;

    /**
     * @var InputCheckbox
     */
    private $termsAndConditions;

    /**
     * @var InputNumber
     */
    private $userCount;

    /**
     * @return void
     */
    public function init(): void
    {
        /* Email */
        $this->email = $this->customFormBuilder->createInputText("email")->setLabel("Email")
                                               ->setPlaceholder("name@example.com")->setMaxLength(255)->setMinLength(3)
                                               ->setRequired(true);

        /* Password */
        $this->password = $this->customFormBuilder->createInputPassword("password")->setLabel("Password")
                                                  ->setPlaceholder("8-64 characters")->setMaxLength(64)->setMinLength(8)
                                                  ->setRequired(true);

        /* Password Repeat */
        $this->passwordRepeat = $this->customFormBuilder->createInputPassword("password-repeat")
                                                        ->setLabel("Password repeat")->setPlaceholder("Repeat password")
                                                        ->setMaxLength(64)->setMinLength(8)
                                                        ->addMatchFieldValueRule($this->password)->setRequired(true);

        /* User count */
        $this->userCount = $this->customFormBuilder->createInputNumber("user-count")->setLabel("User count")
                                                   ->setPlaceHolder("10")->setMax(1000)->setMin(10)->setRequired(true);

        /* Photo */
        $this->photo = $this->customFormBuilder->createInputFile("photo")->setLabel("Photo")->setAccept("image/jpeg")
                                               ->setMultiple(true);

        /* Plan */
        $this->plan = $this->customFormBuilder->createInputRadio("plan")->setLabel("Plan")
                                              ->addOption(true, "Standard", "standard")
                                              ->addOption(false, "Ultimate", "ultimate");

        /* Terms and Conditions */
        $this->termsAndConditions = $this->customFormBuilder->createInputCheckbox("tac")
                                                            ->setLabel("Terms and Conditions")->setRequired(true);

        /* CSRF Token */
        $this->csrfToken = $this->customFormBuilder->createInputHidden("csrf-token")->setRequired(true);

        /* Submit */
        $this->submit = $this->customFormBuilder->createInputSubmit("submit")->setLabel("Submit")->setRequired(true);
    }
}