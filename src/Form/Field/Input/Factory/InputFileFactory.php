<?php

namespace Ironex\Form\Field\Input\Factory;

use Ironex\Form\Field\Input\InputFile;
use Ironex\Form\Field\Rule\MatchMimeTypeRule;
use Ironex\Form\Field\Rule\MaxFileSizeRule;
use Ironex\FormBuilder;

class InputFileFactory extends AbstractInputFactory
{
    /**
     * @var MatchMimeTypeRule
     */
    private $matchMimeTypeRule;

    /**
     * @var MaxFileSizeRule
     */
    private $maxFileSizeRule;

    /**
     * @param FormBuilder $formBuilder
     * @return InputFile
     */
    public function create(FormBuilder $formBuilder): InputFile
    {
        $this->init($formBuilder);

        $inputFile = new InputFile($this->requiredRule, $this->matchMimeTypeRule, $this->maxFileSizeRule);

        return $inputFile;
    }

    /**
     * @param FormBuilder $formBuilder
     * @return void
     */
    protected function init(FormBuilder $formBuilder): void
    {
        parent::init($formBuilder);

        $this->matchMimeTypeRule = $formBuilder->createMatchMimeTypeRule();
        $this->maxFileSizeRule = $formBuilder->createMaxFileSizeRule();
    }
}