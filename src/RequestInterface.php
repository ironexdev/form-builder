<?php

namespace Ironex;

interface RequestInterface
{
    /**
     * @return array
     */
    public function getBody(): array;

    /**
     * @return string
     */
    public function getMethod(): string;
}