<?php

namespace Ironex;

use Ironex\Form\Field\Input\Factory\InputCheckboxFactory;
use Ironex\Form\Field\Input\Factory\InputFileFactory;
use Ironex\Form\Field\Input\Factory\InputHiddenFactory;
use Ironex\Form\Field\Input\Factory\InputNumberFactory;
use Ironex\Form\Field\Input\Factory\InputPasswordFactory;
use Ironex\Form\Field\Input\Factory\InputRadioFactory;
use Ironex\Form\Field\Input\Factory\InputSubmitFactory;
use Ironex\Form\Field\Input\Factory\InputTextFactory;
use Ironex\Form\Field\Input\InputCheckbox;
use Ironex\Form\Field\Input\InputFile;
use Ironex\Form\Field\Input\InputHidden;
use Ironex\Form\Field\Input\InputNumber;
use Ironex\Form\Field\Input\InputPassword;
use Ironex\Form\Field\Input\InputRadio;
use Ironex\Form\Field\Input\InputSubmit;
use Ironex\Form\Field\Input\InputText;
use Ironex\Form\Field\Rule\Factory\CustomRuleFactory;
use Ironex\Form\Field\Rule\Factory\MatchEnumRuleFactory;
use Ironex\Form\Field\Rule\Factory\MatchFieldValueRuleFactory;
use Ironex\Form\Field\Rule\Factory\MatchMimeTypeRuleFactory;
use Ironex\Form\Field\Rule\Factory\MatchValueRuleFactory;
use Ironex\Form\Field\Rule\Factory\MaxFileSizeRuleFactory;
use Ironex\Form\Field\Rule\Factory\MaxLengthRuleFactory;
use Ironex\Form\Field\Rule\Factory\MaxValueRuleFactory;
use Ironex\Form\Field\Rule\Factory\MinLengthRuleFactory;
use Ironex\Form\Field\Rule\Factory\MinValueRuleFactory;
use Ironex\Form\Field\Rule\Factory\RequiredRuleFactory;
use Ironex\Form\Field\Rule\MatchEnumRule;
use Ironex\Form\Field\Rule\MatchFieldValueRule;
use Ironex\Form\Field\Rule\MatchMimeTypeRule;
use Ironex\Form\Field\Rule\MatchValueRule;
use Ironex\Form\Field\Rule\MaxFileSizeRule;
use Ironex\Form\Field\Rule\MaxLengthRule;
use Ironex\Form\Field\Rule\MaxValueRule;
use Ironex\Form\Field\Rule\MinLengthRule;
use Ironex\Form\Field\Rule\MinValueRule;
use Ironex\Form\Field\Rule\RequiredRule;
use Ironex\Form\Field\Select\Factory\SelectFactory;
use Ironex\Form\Field\Select\Select;
use Ironex\Form\Field\TextArea\Factory\TextAreaFactory;
use Ironex\Form\Field\TextArea\TextArea;

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
    protected $inputCheckboxFactory;

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
     * @inject
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
     * @var MatchEnumRuleFactory
     */
    protected $matchEnumRuleFactory;

    /**
     * @inject
     * @var MatchFieldValueRuleFactory
     */
    protected $matchFieldValueRuleFactory;

    /**
     * @inject
     * @var MatchMimeTypeRuleFactory
     */
    protected $matchMimeTypeRuleFactory;

    /**
     * @inject
     * @var MatchValueRuleFactory
     */
    protected $matchValueRuleFactory;

    /**
     * @inject
     * @var MaxFileSizeRuleFactory
     */
    protected $maxFileSizeRuleFactory;

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
     * @inject
     * @var RequiredRuleFactory
     */
    protected $requiredRuleFactory;

    /**
     * @inject
     * @var InputPasswordFactory
     */
    protected $inputPasswordFactory;

    /**
     * @inject
     * @var SelectFactory
     */
    protected $selectFactory;

    /**
     * @inject
     * @var TextAreaFactory
     */
    protected $textAreaFactory;

    /**
     * @param string $name
     * @return InputCheckbox
     */
    public function createInputCheckbox(string $name): InputCheckbox
    {
        $inputCheckbox = $this->inputCheckboxFactory->create($this);
        $inputCheckbox->setName($name);

        return $inputCheckbox;
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
     * @param string $name
     * @return InputPassword
     */
    public function createInputPassword(string $name): InputPassword
    {
        $inputPassword = $this->inputPasswordFactory->create($this);
        $inputPassword->setName($name);

        return $inputPassword;
    }

    /**
     * @return MatchEnumRule
     */
    public function createMatchEnumRule(): MatchEnumRule
    {
        $matchEnumRule = $this->matchEnumRuleFactory->create();

        return $matchEnumRule;
    }

    /**
     * @return MatchFieldValueRule
     */
    public function createMatchFieldValueRule(): MatchFieldValueRule
    {
        $matchFieldValueRule = $this->matchFieldValueRuleFactory->create();

        return $matchFieldValueRule;
    }

    /**
     * @return MatchMimeTypeRule
     */
    public function createMatchMimeTypeRule(): MatchMimeTypeRule
    {
        $matchMimeTypeRule = $this->matchMimeTypeRuleFactory->create();

        return $matchMimeTypeRule;
    }

    /**
     * @return MatchValueRule
     */
    public function createMatchValueRule(): MatchValueRule
    {
        $matchValueRule = $this->matchValueRuleFactory->create();

        return $matchValueRule;
    }

    /**
     * @return MaxFileSizeRule
     */
    public function createMaxFileSizeRule(): MaxFileSizeRule
    {
        $maxFileSizeRule = $this->maxFileSizeRuleFactory->create();

        return $maxFileSizeRule;
    }

    /**
     * @return MaxLengthRule
     */
    public function createMaxLengthRule(): MaxLengthRule
    {
        $maxLengthRule = $this->maxLengthRuleFactory->create();

        return $maxLengthRule;
    }

    /**
     * @return MaxValueRule
     */
    public function createMaxValueRule(): MaxValueRule
    {
        $maxValueRule = $this->maxValueRuleFactory->create();

        return $maxValueRule;
    }

    /**
     * @return MinLengthRule
     */
    public function createMinLengthRule(): MinLengthRule
    {
        $minLengthRule = $this->minLengthRuleFactory->create();

        return $minLengthRule;
    }

    /**
     * @return MinValueRule
     */
    public function createMinValueRule(): MinValueRule
    {
        $minValueRule = $this->minValueRuleFactory->create();

        return $minValueRule;
    }

    /**
     * @return RequiredRule
     */
    public function createRequiredRule(): RequiredRule
    {
        $requiredRule = $this->requiredRuleFactory->create();

        return $requiredRule;
    }

    /**
     * @param string $name
     * @return Select
     */
    public function createSelect(string $name): Select
    {
        $select = $this->selectFactory->create($this);
        $select->setName($name);

        return $select;
    }

    /**
     * @param string $name
     * @return TextArea
     */
    public function createTextArea(string $name): TextArea
    {
        $textArea = $this->textAreaFactory->create($this);
        $textArea->setName($name);

        return $textArea;
    }
}
