<?php

namespace Src\BoundedContext\Product\Domain\Product\Contracts;

use Src\BoundedContext\Product\Domain\Product\Product;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductId;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductUserId;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserId;

interface ProductRepositoryContract
{
    public function getByIdProducts(ProductId $id): ?object;

    public function allByUserProducts(ProductUserId $id): ?object;

    public function save(Product $product): void;

    public function update(ProductId $id, Product $product): void;

    public function delete(ProductId $id): void;
}
