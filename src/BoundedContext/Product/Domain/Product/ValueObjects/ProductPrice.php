<?php

namespace Src\BoundedContext\Product\Domain\Product\ValueObjects;

final class ProductPrice
{
    private $value;

    public function __construct(float $price)
    {
        $this->value = $price;
    }

    public function value(): float
    {
        return $this->value;
    }
}
