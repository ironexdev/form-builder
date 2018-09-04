<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\MatchMimeTypeRule;
use Ironex\Form\Field\Rule\RequiredRule;

class InputFile extends InputAbstract
{
    /**
     * @var string
     */
    protected $type = "file";

    /**
     * @var string
     */
    private $accept;

    /**
     * @var MatchMimeTypeRule
     */
    private $matchMimeTypeRule;

    /**
     * @var bool
     */
    private $multiple;

    /**
     * InputCheckbox constructor.
     * @param CustomRule $customRule
     * @param RequiredRule $requiredRule
     * @param MatchMimeTypeRule $matchMimeTypeRule
     */
    public function __construct(CustomRule $customRule, RequiredRule $requiredRule, MatchMimeTypeRule $matchMimeTypeRule)
    {
        $this->customRule = $customRule;
        $this->requiredRule = $requiredRule;
        $this->matchMimeTypeRule = $matchMimeTypeRule;
    }

    /**
     * @return null|string
     */
    public function getAccept(): ?string
    {
        return $this->accept;
    }

    /**
     * @param string $accept
     * @return $this
     */
    public function setAccept(string $accept): self
    {
        $this->matchMimeTypeRule->setAllowedMimeTypes(explode(",", $accept));
        $this->addMatchMimeTypeRule();
        $this->accept = $accept;

        return $this;
    }

    /**
     * @return string
     */
    public function getMultiple(): string
    {
        return $this->multiple ? "multiple" : "";
    }

    /**
     * @return bool
     */
    public function isMultiple(): bool
    {
        return $this->multiple;
    }

    /**
     * @param bool $multiple
     * @return $this
     */
    public function setMultiple(bool $multiple): self
    {
        $this->multiple = $multiple;

        return $this;
    }

    /**
     * @return void
     */
    private function addMatchMimeTypeRule(): void
    {
        $this->rules[] = $this->matchMimeTypeRule;
    }
}