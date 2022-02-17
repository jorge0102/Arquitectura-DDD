<?php

namespace Src\BoundedContext\Product\Domain\Product\ValueObjects;

final class ProductPriceTaxesIncluded
{
    private $value;

    public function __construct(float $priceTaxesIncluded)
    {
        $this->value = $priceTaxesIncluded;
    }

    public function value(): float
    {
        return $this->value;
    }
}
