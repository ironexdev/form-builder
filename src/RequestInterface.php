<?php

namespace Ironex;

interface RequestInterface
{
    /**
     * @return array
     */
    public function getBody(): array; // $_POST

    /**
     * @return string
     */
    public function getMethod(): string; // POST or GET

    /**
     * @return array
     */
    public function getQuery(): array; // $_GET
}