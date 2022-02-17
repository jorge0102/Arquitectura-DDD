<?php

namespace Src\BoundedContext\Product\Domain\Product\ValueObjects;

class ProductDescription
{
    private $value;

    public function __construct(string $descriptions)
    {
        $this->value = $descriptions;
    }

    public function value(): string
    {
        return $this->value;
    }
}
