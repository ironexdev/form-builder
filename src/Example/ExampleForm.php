<?php

namespace Ironex\Example;

use Ironex\Form\Field\Input\InputCheckbox;
use Ironex\Form\Field\Input\InputFile;
use Ironex\Form\Field\Input\InputHidden;
use Ironex\Form\Field\Input\InputNumber;
use Ironex\Form\Field\Input\InputPassword;
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
     * @var InputPassword
     */
    private $password;

    /**
     * @var InputPassword
     */
    private $passwordRepeat;

    /**
     * @return void
     */
    public function init(): void
    {
        /* Email */
        $this->email = $this->customFormBuilder->createInputText("email");
        $this->email->setLabel("Email");
        $this->email->setPlaceholder("name@example.com");
        $this->email->setMaxLength(255);
        $this->email->setMinLength(3);
        $this->email->setRequired(true);

        /* Password */
        $this->password = $this->customFormBuilder->createInputPassword("password");
        $this->password->setLabel("Password");
        $this->password->setPlaceholder("8-64 characters");
        $this->password->setMaxLength(64);
        $this->password->setMinLength(8);
        $this->password->setRequired(true);

        /* Password Repeat */
        $this->passwordRepeat = $this->customFormBuilder->createInputPassword("password-repeat");
        $this->passwordRepeat->setLabel("Password repeat");
        $this->passwordRepeat->setPlaceholder("Repeat password");
        $this->passwordRepeat->setMaxLength(64);
        $this->passwordRepeat->setMinLength(8);
        $this->passwordRepeat->addMatchFieldValueRule($this->password);
        $this->passwordRepeat->setRequired(true);

        /* User count */
        $this->userCount = $this->customFormBuilder->createInputNumber("user-count");
        $this->userCount->setLabel("User count");
        $this->userCount->setPlaceHolder("10");
        $this->userCount->setMax(1000);
        $this->userCount->setMin(10);
        $this->userCount->setRequired(true);

        /* Photo */
        $this->photo = $this->customFormBuilder->createInputFile("photo");
        $this->photo->setLabel("Photo");
        $this->photo->setAccept("image/jpeg");
        $this->photo->setMultiple(true);

        /* Terms and Conditions */
        $this->termsAndConditions = $this->customFormBuilder->createInputCheckbox("tac");
        $this->termsAndConditions->setLabel("Terms and Conditions");
        $this->termsAndConditions->setRequired(true);

        /* CSRF Token */
        $this->csrfToken = $this->customFormBuilder->createInputHidden("csrf-token");
        $this->csrfToken->setRequired(true);

        /* Submit */
        $this->submit = $this->customFormBuilder->createInputSubmit("submit");
        $this->submit->setLabel("Submit");
        $this->submit->setRequired(true);
    }
}