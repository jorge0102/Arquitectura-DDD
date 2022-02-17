<?php

namespace Src\BoundedContext\Product\Domain\Product\ValueObjects;

final class ProductUserId
{
    private $value;

    public function __construct(int $id)
    {
        $this->value = $id;
    }

    public function value(): int
    {
        return $this->value;
    }
}
