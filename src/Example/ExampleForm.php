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
use Ironex\Form\AbstractForm;

class ExampleForm extends AbstractForm
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
        $this->email = $this->customFormBuilder->createInputText("email");
        $this->password = $this->customFormBuilder->createInputPassword("password");
        $this->passwordRepeat = $this->customFormBuilder->createInputPassword("password-repeat");
        $this->country = $this->customFormBuilder->createSelect("country");
        $this->userCount = $this->customFormBuilder->createInputNumber("user-count");
        $this->photo = $this->customFormBuilder->createInputFile("photo");
        $this->plan = $this->customFormBuilder->createInputRadio("plan");
        $this->termsAndConditions = $this->customFormBuilder->createInputCheckbox("tac");
        $this->description = $this->customFormBuilder->createTextArea("description");
        $this->csrfToken = $this->customFormBuilder->createInputHidden("csrf-token");
        $this->submit = $this->customFormBuilder->createInputSubmit("submit");

        /* Email */
        $this->email->setLabel("Email")
                    ->setMaxLength(255)
                    ->setMinLength(3)
                    ->setPlaceholder("name@example.com")
                    ->setRequired(true)
                    ->addCustomRule((function($value)
                    {
                        return strpos($value, "@") !== false ? true : false;
                    }), "Email field has to be contain a valid e-mail address ({{fieldValue}}).")
                    ->addMatchEnumRule([0, 12345678])
                    ->addMatchFieldValueRule($this->password)
                    ->addMatchValueRule("name@example.com");

        /* Password */
        $this->password->setLabel("Password")
                       ->setMaxLength(64)
                       ->setMinLength(8)
                       ->setPlaceholder("8-64 characters")
                       ->setRequired(true)
                       ->addCustomRule((function($value)
                       {
                           return $value ? true : false;
                       }), "");

        /* Password Repeat */
        $this->passwordRepeat->setLabel("Password repeat")
                             ->setMaxLength(64)
                             ->setMinLength(8)
                             ->setPlaceholder("Repeat password")
                             ->setRequired(true)
                             ->addCustomRule((function($value)
                             {
                                 return $value ? true : false;
                             }), "")
                             ->addMatchFieldValueRule($this->password);

        /* Country */
        $this->country->setLabel("Country")
                      ->setRequired(true)
                      ->addOption("Select country", null, true, true)
                      ->addOption("Czechia", 0)
                      ->addOption("Slovakia2", 1);

        /* User count */
        $this->userCount->setLabel("User count")
                        ->setMax(1000)
                        ->setMin(10)
                        ->setPlaceHolder("10")
                        ->setRequired(true)
                        ->addCustomRule((function($value)
                        {
                            return $value ? true : false;
                        }), "")
                        ->addMatchEnumRule([0, 12345678])
                        ->addMatchFieldValueRule($this->email)
                        ->addMatchValueRule("name@example.com");

        /* Photo */
        $this->photo->setAccept("image/jpeg")
                    ->setLabel("Photo")
                    ->setMultiple(true)
                    ->setRequired(true)
                    ->addCustomRule((function($value)
                    {
                        return $value ? true : false;
                    }), "")
                    ->addMaxFileSizeRule(100);

        /* Plan */
        $this->plan->setLabel("Plan")
                   ->setRequired(true)
                   ->addOption(true, "Standard", 0)
                   ->addOption(false, "Ultimate", 1)
                   ->addCustomRule((function($value)
                   {
                       return $value ? true : false;
                   }), "");

        /* Terms and Conditions */
        $this->termsAndConditions->setLabel("Terms and Conditions")
                                 ->setRequired(true)
                                 ->addCustomRule((function($value)
                                 {
                                     return $value ? true : false;
                                 }), "");

        /* Description */
        $this->description->setLabel("Description")
                          ->setMaxLength(1064)
                          ->setMinLength(1)
                          ->setPlaceholder("Description")
                          ->setRequired(true)
                          ->addCustomRule((function($value)
                          {
                              return $value ? true : false;
                          }), "");

        /* CSRF Token */
        $this->csrfToken->setRequired(true)
                        ->addMatchEnumRule([0, 12345678])
                        ->addMatchFieldValueRule($this->email)
                        ->addMatchValueRule("name@example.com")
                        ->addCustomRule((function($value)
                        {
                            return $value ? true : false;
                        }), "");

        /* Submit */
        $this->submit->setLabel("Submit")
                     ->setRequired(true)
                     ->addCustomRule((function($value)
                     {
                         return $value ? true : false;
                     }), "");
    }
}