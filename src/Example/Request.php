<?php

namespace Ironex\Example;

use Ironex\RequestInterface;

class Request implements RequestInterface
{
    /**
     * @var array
     */
    private $body;

    /**
     * @var string
     */
    private $method;

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * @param array $body
     */
    public function setBody(array $body): void
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }
}