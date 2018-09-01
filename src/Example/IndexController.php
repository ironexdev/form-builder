<?php

namespace Ironex\Example;

use Ironex\Form\Field\Input\InputText;

class IndexController
{
    /**
     * @inject
     * @var ExampleForm
     */
    private $exampleForm;

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

    public function processExampleForm()
    {
        echo 1;
    }
}