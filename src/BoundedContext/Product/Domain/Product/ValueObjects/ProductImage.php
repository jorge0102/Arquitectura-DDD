<?php

namespace Src\BoundedContext\Product\Domain\Product\ValueObjects;

final class ProductImage
{
    private $value;

    public function __construct(string $image)
    {
        $this->value = $image;
    }

    public function value(): string
    {
        return $this->value;
    }
}
