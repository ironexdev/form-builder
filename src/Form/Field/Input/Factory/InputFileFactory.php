<?php

namespace Ironex\Form\Field\Input\Factory;

use Ironex\Form\Field\Input\InputFile;
use Ironex\FormBuilder;

class InputFileFactory extends InputFactoryAbstract
{
    /**
     * @param FormBuilder $formBuilder
     * @return InputFile
     */
    public function create(FormBuilder $formBuilder): InputFile
    {
        $this->init($formBuilder);

        $inputFile = new InputFile();
        $inputFile->setCustomRule($this->customRule);

        return $inputFile;
    }
}