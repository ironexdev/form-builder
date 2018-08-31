<?php

namespace Ironex;

use Ironex\Form\Field\Input\Factory\InputCheckboxFactory;
use Ironex\Form\Field\Input\Factory\InputFileFactory;
use Ironex\Form\Field\Input\Factory\InputHiddenFactory;
use Ironex\Form\Field\Input\Factory\InputNumberFactory;
use Ironex\Form\Field\Input\Factory\InputRadioFactory;
use Ironex\Form\Field\Input\Factory\InputSubmitFactory;
use Ironex\Form\Field\Input\Factory\InputTextFactory;
use Ironex\Form\Field\Input\InputCheckbox;
use Ironex\Form\Field\Input\InputFile;
use Ironex\Form\Field\Input\InputHidden;
use Ironex\Form\Field\Input\InputNumber;
use Ironex\Form\Field\Input\InputRadio;
use Ironex\Form\Field\Input\InputSubmit;
use Ironex\Form\Field\Input\InputText;
use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\Factory\CustomRuleFactory;
use Ironex\Form\Field\Rule\Factory\MatchFieldValueRuleFactory;
use Ironex\Form\Field\Rule\Factory\MatchValueRuleFactory;
use Ironex\Form\Field\Rule\Factory\MaxLengthRuleFactory;
use Ironex\Form\Field\Rule\Factory\MaxValueRuleFactory;
use Ironex\Form\Field\Rule\Factory\MinLengthRuleFactory;
use Ironex\Form\Field\Rule\Factory\MinValueRuleFactory;
use Ironex\Form\Field\Rule\MatchFieldValueRule;
use Ironex\Form\Field\Rule\MatchValueRule;
use Ironex\Form\Field\Rule\MaxLengthRule;
use Ironex\Form\Field\Rule\MaxValueRule;
use Ironex\Form\Field\Rule\MinLengthRule;
use Ironex\Form\Field\Rule\MinValueRule;

class FormBuilder
{
    /**
     * @inject
     * @var CustomRuleFactory
     */
    protected $customRuleFactory;

    /**
     * @inject
     * @var InputCheckboxFactory
     */
    protected $InputCheckboxFactory;

    /**
     * @inject
     * @var InputFileFactory
     */
    protected $inputFileFactory;

    /**
     * @inject
     * @var InputHiddenFactory
     */
    protected $inputHiddenFactory;

    /**
     * @var InputNumberFactory
     */
    protected $inputNumberFactory;

    /**
     * @inject
     * @var InputRadioFactory
     */
    protected $inputRadioFactory;

    /**
     * @inject
     * @var InputSubmitFactory
     */
    protected $inputSubmitFactory;

    /**
     * @inject
     * @var InputTextFactory
     */
    protected $inputTextFactory;

    /**
     * @inject
     * @var MatchFieldValueRuleFactory
     */
    protected $matchFieldValueRuleFactory;

    /**
     * @inject
     * @var MatchValueRuleFactory
     */
    protected $matchValueRuleFactory;

    /**
     * @inject
     * @var MaxLengthRuleFactory
     */
    protected $maxLengthRuleFactory;

    /**
     * @inject
     * @var MaxValueRuleFactory
     */
    protected $maxValueRuleFactory;

    /**
     * @inject
     * @var MinLengthRuleFactory
     */
    protected $minLengthRuleFactory;

    /**
     * @inject
     * @var MinValueRuleFactory
     */
    protected $minValueRuleFactory;

    /**
     * @return CustomRule
     */
    public function createCustomRule(): CustomRule
    {
        $customRule = $this->customRuleFactory->create();

        return $customRule;
    }

    /**
     * @param string $name
     * @return InputCheckbox
     */
    public function createInputCheckbox(string $name): InputCheckbox
    {
        $InputCheckbox = $this->InputCheckboxFactory->create($this);
        $InputCheckbox->setName($name);

        return $InputCheckbox;
    }

    /**
     * @param string $name
     * @return InputFile
     */
    public function createInputFile(string $name): InputFile
    {
        $inputFile = $this->inputFileFactory->create($this);
        $inputFile->setName($name);

        return $inputFile;
    }

    /**
     * @param string $name
     * @return InputHidden
     */
    public function createInputHidden(string $name): InputHidden
    {
        $inputHidden = $this->inputHiddenFactory->create($this);
        $inputHidden->setName($name);

        return $inputHidden;
    }

    /**
     * @param string $name
     * @return InputNumber
     */
    public function createInputNumber(string $name): InputNumber
    {
        $inputNumber = $this->inputNumberFactory->create($this);
        $inputNumber->setName($name);

        return $inputNumber;
    }

    /**
     * @param string $name
     * @return InputRadio
     */
    public function createInputRadio(string $name): InputRadio
    {
        $inputRadio = $this->inputRadioFactory->create($this);
        $inputRadio->setName($name);

        return $inputRadio;
    }

    /**
     * @param string $name
     * @return InputSubmit
     */
    public function createInputSubmit(string $name): InputSubmit
    {
        $inputSubmit = $this->inputSubmitFactory->create($this);
        $inputSubmit->setName($name);

        return $inputSubmit;
    }

    /**
     * @param string $name
     * @return InputText
     */
    public function createInputText(string $name): InputText
    {
        $inputText = $this->inputTextFactory->create($this);
        $inputText->setName($name);

        return $inputText;
    }

    /**
     * @return MatchFieldValueRule
     */
    public function createMatchFieldValueRule(): MatchFieldValueRule
    {
        $matchFieldValueRule = $this->matchFieldValueRuleFactory->create();
        $matchFieldValueRule->setErrorMessage("{{fieldLabel}} field value ({{fieldValue}}) has to match {{fieldToMatchLabel}} field value ({{fieldToMatchValue}})");

        return $matchFieldValueRule;
    }

    /**
     * @return MatchValueRule
     */
    public function createMatchValueRule(): MatchValueRule
    {
        $matchValueRule = $this->matchValueRuleFactory->create();
        $matchValueRule->setErrorMessage("{{fieldLabel}} field value ({{fieldValue}}) has to match {{valueToMatch}} value");

        return $matchValueRule;
    }

    /**
     * @return MaxLengthRule
     */
    public function createMaxLengthRule(): MaxLengthRule
    {
        $maxLengthRule = $this->maxLengthRuleFactory->create();
        $maxLengthRule->setErrorMessage("length of {{fieldLabel}} field value ({{fieldValue}} - {{fieldValueLength}}) has to be at most {{maxLength}}");

        return $maxLengthRule;
    }

    /**
     * @return MaxValueRule
     */
    public function createMaxValueRule(): MaxValueRule
    {
        $maxValueRule = $this->maxValueRuleFactory->create();
        $maxValueRule->setErrorMessage("{{fieldLabel}} field value ({{fieldValue}}) has to be lower or equal to {{maxValue}}");

        return $maxValueRule;    
    }

    /**
     * @return MinLengthRule
     */
    public function createMinLengthRule(): MinLengthRule
    {
        $minLengthRule = $this->minLengthRuleFactory->create();
        $minLengthRule->setErrorMessage("length of {{fieldLabel}} field value ({{fieldValue}} - {{fieldValueLength}}) has to be at least {{minLength}}");

        return $minLengthRule;
    }

    /**
     * @return MinValueRule
     */
    public function createMinValueRule(): MinValueRule
    {
        $minValueRule = $this->minValueRuleFactory->create();
        $minValueRule->setErrorMessage("{{fieldLabel}} field value ({{fieldValue}}) has to be lower or equal to {{minValue}}");

        return $minValueRule;
    }
}