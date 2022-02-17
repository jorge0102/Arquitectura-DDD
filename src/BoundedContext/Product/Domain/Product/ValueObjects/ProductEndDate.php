<?php

namespace Src\BoundedContext\Product\Domain\Product\ValueObjects;

final class ProductEndDate
{
    private $value;

    public function __construct(string $date)
    {
        $this->value = $date;
    }

    public function value(): string
    {
        return $this->value;
    }
}
