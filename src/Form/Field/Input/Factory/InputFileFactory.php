<?php

namespace Ironex\Form\Field\Input\Factory;

use Ironex\Form\Field\Input\InputFile;
use Ironex\Form\Field\Rule\MatchMimeTypeRule;
use Ironex\FormBuilder;

class InputFileFactory extends InputFactoryAbstract
{
    /**
     * @var MatchMimeTypeRule
     */
    private $matchMimeTypeRule;

    /**
     * @param FormBuilder $formBuilder
     * @return InputFile
     */
    public function create(FormBuilder $formBuilder): InputFile
    {
        $this->init($formBuilder);

        $inputFile = new InputFile($this->customRule, $this->requiredRule, $this->matchMimeTypeRule);

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
    }
}