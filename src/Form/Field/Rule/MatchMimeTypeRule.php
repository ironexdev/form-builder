<?php

namespace Ironex\Form\Field\Rule;

use Ironex\Form\Field\FieldInterface;

class MatchMimeTypeRule extends RuleAbstract implements RuleInterface
{
    /**
     * @var array
     */
    private $allowedMimeTypes;

    /**
     * @param FieldInterface $field
     * @return string
     */
    public function getErrorMessage(FieldInterface $field): string
    {
        return strtr($this->errorMessage, [
            "{{fieldLabel}}" => $field->getLabel(),
            "{{allowedMimeTypes}}" => $this->constraint
        ]);
    }

    /**
     * @param array $allowedMimeTypes
     * @return void
     */
    public function setAllowedMimeTypes(array $allowedMimeTypes): void
    {
        $this->allowedMimeTypes = $allowedMimeTypes;
        $this->constraint = implode(",", $allowedMimeTypes);
    }

    /**
     * @param $value
     * @return bool
     */
    public function test($value): bool
    {
        if (gettype($value["type"]) === "string")
        {
            $mimeType = $value["type"];

            return in_array($mimeType, $this->allowedMimeTypes, true);
        }
        else if (gettype($value["type"]) === "array")
        {
            foreach ($value["type"] as $mimeType)
            {
                if (!in_array($mimeType, $this->allowedMimeTypes, true))
                {
                    return false;
                }
            }

            return true;
        }
        else
        {
            return false;
        }
    }
}