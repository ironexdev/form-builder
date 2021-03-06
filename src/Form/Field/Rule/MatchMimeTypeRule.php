<?php

namespace Ironex\Form\Field\Rule;

class MatchMimeTypeRule extends AbstractRule implements RuleInterface
{
    /**
     * @var array
     */
    private $allowedMimeTypes;

    /**
     * @return array
     */
    public function getAllowedMimeTypes(): array
    {
        return $this->allowedMimeTypes;
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