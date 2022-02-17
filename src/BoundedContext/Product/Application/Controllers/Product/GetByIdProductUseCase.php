<?php

namespace Src\BoundedContext\Product\Application\Controllers\Product;

use Src\BoundedContext\Product\Domain\Product\Contracts\ProductRepositoryContract;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductId;

final class GetByIdProductUseCase
{
    private $repository;

    public function __construct(ProductRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $product_id): ?object
    {
        $id = new ProductId($product_id);

        $products = $this->repository->getByIdProducts($id);

        return $products;
    }
}
