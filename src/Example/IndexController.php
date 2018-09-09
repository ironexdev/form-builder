<?php

namespace Ironex\Example;

use Ironex\Exception\BadRequestIronException;
use Ironex\Exception\MethodNotAllowedIronException;
use Ironex\Form\Field\Input\InputCheckbox;
use Ironex\Form\Field\Input\InputFile;
use Ironex\Form\Field\Input\InputHidden;
use Ironex\Form\Field\Input\InputNumber;
use Ironex\Form\Field\Input\InputRadio;
use Ironex\Form\Field\Input\InputText;
use Ironex\Form\Field\Select\Select;
use Ironex\Form\Field\TextArea\TextArea;

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

        /** @var Select $countryField */
        $countryField = $fields["country"];
        $countryFieldId = $this->exampleForm->getName() . "-" . $countryField->getName();
        $countryFieldOptionsHtml = "";

        foreach ($countryField->getOptions() as $countryFieldOption)
        {
            $countryFieldOptionsHtml .= "<option " . $countryFieldOption->getDisabled() . " " . $countryFieldOption->getselected() . " value='" . $countryFieldOption->getValue() . "'>" . $countryFieldOption->getLabel() . "</option>";
        }

        /** @var InputNumber $userCountField */
        $userCountField = $fields["user-count"];
        $userCountFieldId = $this->exampleForm->getName() . "-" . $userCountField->getName();
        $userCountFieldMax = $userCountField->getMax() ? "max='" . $userCountField->getMax() . "'" : "";

        /** @var InputFile $photoField */
        $photoField = $fields["photo"];
        $photoFieldId = $this->exampleForm->getName() . "-" . $photoField->getName();
        $photoFieldName = $photoField->getMultiple() ? $photoField->getName() . "[]" : $photoField->getName();

        /** @var InputRadio $planField */
        $planField = $fields["plan"];
        $planFieldId = $this->exampleForm->getName() . "-" . $planField->getName();
        $planFieldHtml = "";

        $i = 0;
        foreach ($planField->getOptions() as $planFieldOption)
        {
            $planFieldOptionId = $planFieldId . "-" . $i;
            $planFieldHtml .= "<label for='$planFieldOptionId'>{$planFieldOption->getLabel()}</label>" . "<input {$planFieldOption->getChecked()} data-rules='{$planField->getRulesJson()}' id='$planFieldOptionId' name='{$planField->getName()}' {$planField->getRequired()} title='{$planFieldOption->getLabel()}' type='{$planField->getType()}' value='{$planFieldOption->getValue()}'>";
            $i++;
        }

        /** @var InputCheckbox $tacField */
        $tacField = $fields["tac"];
        $tacFieldId = $this->exampleForm->getName() . "-" . $tacField->getName();

        /** @var TextArea $descriptionField */
        $descriptionField = $fields["description"];
        $descriptionFieldId = $this->exampleForm->getName() . "-" . $descriptionField->getName();        

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
        <label for='$countryFieldId'>{$countryField->getLabel()}</label>
        <select data-rules='{$countryField->getRulesJson()}' id='$countryFieldId' name='{$countryField->getName()}' {$countryField->getRequired()} title='{$countryField->getLabel()}'>
            $countryFieldOptionsHtml
        </select>
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
        $planFieldHtml
    </field>    
    <field>
        <label for='$tacFieldId'>{$tacField->getLabel()}</label>
        <input data-rules='{$tacField->getRulesJson()}' id='$tacFieldId' name='{$tacField->getName()}' {$tacField->getRequired()} title='{$tacField->getLabel()}' type='{$tacField->getType()}'>
    </field>
    <field>
        <label for='$descriptionFieldId'>{$descriptionField->getLabel()}</label>
        <textarea data-rules='{$descriptionField->getRulesJson()}' id='$descriptionFieldId' name='{$descriptionField->getName()}' placeholder='{$descriptionField->getPlaceholder()}' {$descriptionField->getRequired()} title='{$descriptionField->getLabel()}'></textarea>
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
        /*
         * Check following php.ini settings:
         * - file_uploads
         * - max_file_uploads
         * - post_max_size
         * - upload_max_filesize
         * - make sure post_max_size is same or larger than upload_max_filesize
         */

        if ($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST) && empty($_FILES) && $_SERVER["CONTENT_LENGTH"] > 0)
        {
            $response = [
                "success" => false,
                "message" => "POST data is too large - max POST size is " . ini_get("post_max_size") . ", size of received data is " . $_SERVER["CONTENT_LENGTH"] . "."
            ];

            echo json_encode($response, JSON_PRETTY_PRINT);
            die();
        }

        $fileParameters = [];
        foreach ($_FILES as $fileParameter => $fileParameterValue)
        {
            if ($fileParameterValue["error"] !== UPLOAD_ERR_OK && (isset($fileParameterValue["error"][0]) && $fileParameterValue["error"][0] !== UPLOAD_ERR_OK))
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

        $response = [
            "success" => true,
            "message" => "Form has been successfully submitted."
        ];

        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}