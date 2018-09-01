<?php

namespace Ironex\Example;

use Ironex\Exception\BadRequestIronException;
use Ironex\Exception\MethodNotAllowedIronException;
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
    public function renderDefault()
    {
        $this->exampleForm->init();

        $formArray = $this->exampleForm->toArray();
        $fields = $formArray["fields"];

       /** @var InputText $emailField */
       $emailField = $fields["email"];
       $emailFieldId =$this->exampleForm->getName() . "-" . $emailField->getName();
       /** @var InputText $submitField */
       $submitField = $fields["submit"];
       $submitFieldId =$this->exampleForm->getName() . "-" . $submitField->getName();

        echo "<form "
           . "accept-charset='" . $this->exampleForm->getAcceptCharset() . "' "
           . "action='" . $this->exampleForm->getAction() . "' "
           . "autocomplete='" . $this->exampleForm->getAutocomplete() . "' "
           . "enctype='" . $this->exampleForm->getEnctype() . "' "
           . "method='" . $this->exampleForm->getMethod() . "' "
           . "name='" . $this->exampleForm->getName() . "' "
           . ($this->exampleForm->getNovalidate() ? "novalidate " : " ")
           . "target='" . $this->exampleForm->getTarget() . "' "
           . ">"
           . "<field>"
           . "<label for='" . $emailFieldId . "'>" . $emailField->getLabel() . "</label>"
           . "<input id='" . $emailFieldId . "' name='" . $emailField->getName() . "' placeholder='" . $emailField->getPlaceholder() . "'" . " title='" . $emailField->getLabel() . "' type='" . $emailField->getType() . "'>"
           . "</field>"
           . "<field>"
           . "<input id='" . $submitFieldId . "' name='" . $submitField->getName() . "' title='" . $submitField->getLabel() . "' type='" . $submitField->getType() . "'>"
           . "</field>"
           . "</form>";
    }

    /**
     * @return void
     * @throws BadRequestIronException
     * @throws MethodNotAllowedIronException
     */
    public function processExampleForm(): void
    {
        $request = new Request();
        $request->setBody($_POST);
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