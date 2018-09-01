<?php

namespace Ironex;

interface RequestInterface
{
    /**
     * @return array
     */
    public function getBody(): array; // associative array, ie: $_GET, $_POST, etc ...

    /**
     * @return string
     */
    public function getMethod(): string; // POST, GET, etc ...
}