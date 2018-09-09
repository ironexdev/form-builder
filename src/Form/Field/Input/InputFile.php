<?php

namespace Ironex\Form\Field\Input;

use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\MatchMimeTypeRule;
use Ironex\Form\Field\Rule\MaxFileSizeRule;
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
     * @var MaxFileSizeRule
     */
    private $maxFileSizeRule;

    /**
     * @var bool
     */
    private $multiple;

    /**
     * InputFile constructor.
     * @param CustomRule $customRule
     * @param RequiredRule $requiredRule
     * @param MatchMimeTypeRule $matchMimeTypeRule
     * @param MaxFileSizeRule $maxFileSizeRule
     */
    public function __construct(CustomRule $customRule, RequiredRule $requiredRule, MatchMimeTypeRule $matchMimeTypeRule, MaxFileSizeRule $maxFileSizeRule)
    {
        $this->customRule = $customRule;
        $this->requiredRule = $requiredRule;
        $this->matchMimeTypeRule = $matchMimeTypeRule;
        $this->maxFileSizeRule = $maxFileSizeRule;
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
     * @param int $maxFileSize
     * @return $this
     */
    public function addMaxFileSizeRule(int $maxFileSize): self
    {
        $this->maxFileSizeRule->setMaxFileSize($maxFileSize);

        $this->rules[$this->maxFileSizeRule->getName()] = $this->maxFileSizeRule;

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
        $this->rules[$this->matchMimeTypeRule->getName()] = $this->matchMimeTypeRule;
    }
}