<?php

namespace Ironex\Form\Field\Select;

use Ironex\Form\Field\FieldAbstract;
use Ironex\Form\Field\FieldInterface;
use Ironex\Form\Field\Rule\CustomRule;
use Ironex\Form\Field\Rule\MatchEnumRule;
use Ironex\Form\Field\Rule\RequiredRule;
use Ironex\Form\Field\Select\Factory\OptionFactory;

class Select extends FieldAbstract implements FieldInterface
{
    /**
     * @var MatchEnumRule
     */
    protected $matchEnumRule;

    /**
     * @var OptionFactory
     */
    protected $optionFactory;

    /**
     * @var Option[]
     */
    private $options = [];

    /**
     * Select constructor.
     * @param CustomRule $customRule
     * @param RequiredRule $requiredRule
     * @param MatchEnumRule $matchEnumRule
     * @param OptionFactory $optionFactory
     */
    public function __construct(CustomRule $customRule, RequiredRule $requiredRule, MatchEnumRule $matchEnumRule, OptionFactory $optionFactory)
    {
        $this->customRule = $customRule;
        $this->requiredRule = $requiredRule;
        $this->matchEnumRule = $matchEnumRule;
        $this->optionFactory = $optionFactory;
    }

    /**
     * @param string $label
     * @param $value
     * @param bool $disabled
     * @param bool $selected
     * @return $this
     */
    public function addOption(string $label, $value, bool $disabled = false, bool $selected = false): self
    {
        $option = $this->optionFactory->create();
        $option->setLabel($label);
        $option->setValue($value);
        $option->setDisabled($disabled);
        $option->setSelected($selected);

        $this->options[] = $option;

        if (!$disabled)
        {
            $this->matchEnumRule->addValue($value);
            $this->addMatchEnumRule();
        }

        return $this;
    }

    /**
     * @return Option[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return void
     */
    private function addMatchEnumRule(): void
    {
        $this->rules[$this->matchEnumRule->getName()] = $this->matchEnumRule;
    }
}