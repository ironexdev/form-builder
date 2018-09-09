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
use Ironex\Form\Field\Select\Select;
use Ironex\Form\Field\TextArea\TextArea;
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
     * @var Select
     */
    private $country;

    /**
     * @var InputHidden
     */
    private $csrfToken;

    /**
     * @var TextArea
     */
    private $description;

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
        $this->email = $this->customFormBuilder->createInputText("email")
                                               ->setLabel("Email")
                                               ->setPlaceholder("name@example.com")
                                               ->setMaxLength(255)
                                               ->setMinLength(3)
                                               ->addCustomRule((function($value)
                                               {
                                                   return strpos($value, "@") !== false ? true : false;
                                               }), "Email field has to be contain a valid e-mail address ({{fieldValue}}).")
                                               ->addMatchValueRule("name@example.com")
                                               ->setRequired(true);

        /* Password */
        $this->password = $this->customFormBuilder->createInputPassword("password")
                                                  ->setLabel("Password")
                                                  ->setPlaceholder("8-64 characters")
                                                  ->setMaxLength(64)
                                                  ->setMinLength(8)
                                                  ->setRequired(true);

        /* Password Repeat */
        $this->passwordRepeat = $this->customFormBuilder->createInputPassword("password-repeat")
                                                        ->setLabel("Password repeat")
                                                        ->setPlaceholder("Repeat password")
                                                        ->setMaxLength(64)
                                                        ->setMinLength(8)
                                                        ->addMatchFieldValueRule($this->password)
                                                        ->setRequired(true);

        /* Country */
        $this->country = $this->customFormBuilder->createSelect("country")
                                                 ->setLabel("Country")
                                                 ->addOption("Select country", null, true, true)
                                                 ->addOption("Czechia", 0)
                                                 ->addOption("Slovakia2", 1)
                                                 ->setRequired(true);

        /* User count */
        $this->userCount = $this->customFormBuilder->createInputNumber("user-count")
                                                   ->setLabel("User count")
                                                   ->setPlaceHolder("10")
                                                   ->setMax(1000)
                                                   ->setMin(10)
                                                   ->setRequired(true);

        /* Photo */
        $this->photo = $this->customFormBuilder->createInputFile("photo")
                                               ->setLabel("Photo")
                                               ->setAccept("image/jpeg")
                                               ->addMaxFileSizeRule(100)
                                               ->setMultiple(true);

        /* Plan */
        $this->plan = $this->customFormBuilder->createInputRadio("plan")
                                              ->setLabel("Plan")
                                              ->addOption(true, "Standard", 0)
                                              ->addOption(false, "Ultimate", 1)
                                              ->setRequired(true);

        /* Terms and Conditions */
        $this->termsAndConditions = $this->customFormBuilder->createInputCheckbox("tac")
                                                            ->setLabel("Terms and Conditions")
                                                            ->setRequired(true);

        /* Description */
        $this->description = $this->customFormBuilder->createTextArea("description")
                                                     ->setLabel("Description")
                                                     ->setMaxLength(1064)
                                                     ->setMinLength(1)
                                                     ->setPlaceholder("Description");

        /* CSRF Token */
        $this->csrfToken = $this->customFormBuilder->createInputHidden("csrf-token")
                                                   ->setRequired(true);

        /* Submit */
        $this->submit = $this->customFormBuilder->createInputSubmit("submit")
                                                ->setLabel("Submit")
                                                ->setRequired(true);
    }
}