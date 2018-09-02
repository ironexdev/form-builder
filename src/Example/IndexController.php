<?php

namespace Ironex\Example;

use Ironex\Exception\BadRequestIronException;
use Ironex\Exception\MethodNotAllowedIronException;
use Ironex\Form\Field\Input\InputCheckbox;
use Ironex\Form\Field\Input\InputFile;
use Ironex\Form\Field\Input\InputHidden;
use Ironex\Form\Field\Input\InputNumber;
use Ironex\Form\Field\Input\InputText;

class IndexController
{
    /**
     * @inject
     * @var ExampleForm
     */
    private $exampleForm;

    /**
     * @return void
     */
    public function renderDefault(): void
    {
        $this->exampleForm->init();

        $formArray = $this->exampleForm->toArray();
        $fields = $formArray["fields"];

        /** @var InputText $emailField */
        $emailField = $fields["email"];
        $emailFieldId = $this->exampleForm->getName() . "-" . $emailField->getName();

        /** @var InputText $passwordField */
        $passwordField = $fields["password"];
        $passwordFieldId = $this->exampleForm->getName() . "-" . $passwordField->getName();

        /** @var InputText $passwordRepeatField */
        $passwordRepeatField = $fields["password-repeat"];
        $passwordRepeatFieldId = $this->exampleForm->getName() . "-" . $passwordRepeatField->getName();

        /** @var InputNumber $userCountField */
        $userCountField = $fields["user-count"];
        $userCountFieldId = $this->exampleForm->getName() . "-" . $userCountField->getName();
        $userCountFieldMax = $userCountField->getMax() ? "max='" . $userCountField->getMax() . "'" : "";

        /** @var InputFile $photoField */
        $photoField = $fields["photo"];
        $photoFieldId = $this->exampleForm->getName() . "-" . $photoField->getName();
        $photoFieldName = $photoField->getMultiple() ? $photoField->getName() . "[]" : $photoField->getName();

        /** @var InputCheckbox $tacField */
        $tacField = $fields["tac"];
        $tacFieldId = $this->exampleForm->getName() . "-" . $tacField->getName();

        /** @var InputHidden $csrfTokenField */
        $csrfTokenField = $fields["csrf-token"];
        $csrfTokenFieldId = $this->exampleForm->getName() . "-" . $csrfTokenField->getName();
        $csrfTokenFieldValue = uniqid();

        /** @var InputText $submitField */
        $submitField = $fields["submit"];
        $submitFieldId = $this->exampleForm->getName() . "-" . $submitField->getName();

        echo <<<EOT
<form 
    accept-charset='{$this->exampleForm->getAcceptCharset()}' 
    action='{$this->exampleForm->getAction()}' 
    autocomplete='{$this->exampleForm->getAutocomplete()}' 
    enctype='{$this->exampleForm->getEnctype()}' 
    method='{$this->exampleForm->getMethod()}' 
    name='{$this->exampleForm->getName()}' 
    {$this->exampleForm->getNovalidate()}
    target='{$this->exampleForm->getTarget()}' 
>
    <field>
        <label for='$emailFieldId'>{$emailField->getLabel()}</label>
        <input data-rules='{$emailField->getRulesJson()}' id='$emailFieldId' name='{$emailField->getName()}' placeholder='{$emailField->getPlaceholder()}' {$emailField->getRequired()} title='{$emailField->getLabel()}' type='{$emailField->getType()}'>
    </field>
    <field>
        <label for='$passwordFieldId'>{$passwordField->getLabel()}</label>
        <input data-rules='{$passwordField->getRulesJson()}' id='$passwordFieldId' name='{$passwordField->getName()}' placeholder='{$passwordField->getPlaceholder()}' {$passwordField->getRequired()} title='{$passwordField->getLabel()}' type='{$passwordField->getType()}'>
    </field>
    <field>
        <label for='$passwordRepeatFieldId'>{$passwordRepeatField->getLabel()}</label>
        <input data-rules='{$passwordRepeatField->getRulesJson()}' id='$passwordRepeatFieldId' name='{$passwordRepeatField->getName()}' placeholder='{$passwordRepeatField->getPlaceholder()}' {$passwordRepeatField->getRequired()} title='{$passwordRepeatField->getLabel()}' type='{$passwordRepeatField->getType()}'>
    </field>
    <field>
        <label for='$userCountFieldId'>{$userCountField->getLabel()}</label>
        <input data-rules='{$userCountField->getRulesJson()}' id='$userCountFieldId' {$userCountFieldMax} name='{$userCountField->getName()}' placeholder='{$userCountField->getPlaceholder()}' {$userCountField->getRequired()} title='{$userCountField->getLabel()}' type='{$userCountField->getType()}'>
    </field>
    <field>
        <label for='$photoFieldId'>{$photoField->getLabel()}</label>
        <input accept='{$photoField->getAccept()}' data-rules='{$photoField->getRulesJson()}' id='$photoFieldId' {$photoField->getMultiple()} name='{$photoFieldName}' {$photoField->getRequired()} title='{$photoField->getLabel()}' type='{$photoField->getType()}'>
    </field>
    <field>
        <label for='$tacFieldId'>{$tacField->getLabel()}</label>
        <input data-rules='{$tacField->getRulesJson()}' id='$tacFieldId' name='{$tacField->getName()}' {$tacField->getRequired()} title='{$tacField->getLabel()}' type='{$tacField->getType()}'>
    </field>
    <field>
        <input data-rules='{$csrfTokenField->getRulesJson()}' id='$csrfTokenFieldId' name='{$csrfTokenField->getName()}' {$csrfTokenField->getRequired()} type='{$csrfTokenField->getType()}' value='{$csrfTokenFieldValue}'>
    </field>
    <field>
        <input data-rules='{$submitField->getRulesJson()}' id='$submitFieldId' name='{$submitField->getName()}' {$submitField->getRequired()} title='{$submitField->getLabel()}' type='{$submitField->getType()}' value='{$submitField->getLabel()}'>
    </field>
</form>
EOT;
    }

    /**
     * @return void
     * @throws BadRequestIronException
     * @throws MethodNotAllowedIronException
     */
    public function processExampleForm(): void
    {
        $fileParameters = [];
        foreach ($_FILES as $fileParameter => $fileParameterValue)
        {
            if ($fileParameterValue["error"] === UPLOAD_ERR_NO_FILE || (isset($fileParameterValue["error"][0]) && $fileParameterValue["error"][0] === UPLOAD_ERR_NO_FILE))
            {
                continue;
            }
            else
            {
                $fileParameters[$fileParameter] = $fileParameterValue;
            }
        }

        $request = new Request();
        $request->setBody(array_merge($_POST, $fileParameters));
        $request->setMethod($_SERVER["REQUEST_METHOD"]);

        $this->exampleForm->init();
        $this->exampleForm->setValues($request);
        $this->exampleForm->validate();

        if (!$this->exampleForm->isValid())
        {
            var_dump($this->exampleForm->getErrors());
            die();
        }

        echo "Form has been successfully submitted.";
    }
}