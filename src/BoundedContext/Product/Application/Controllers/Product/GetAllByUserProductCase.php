<?php

namespace Src\BoundedContext\Product\Application\Controllers\Product;

use Src\BoundedContext\Product\Domain\Product\Contracts\ProductRepositoryContract;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductUserId;

final class GetAllByUserProductCase
{
    private $repository;

    public function __construct(ProductRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $auth_id): ?object
    {
        $id = new ProductUserId($auth_id);

        $products = $this->repository->allByUserProducts($id);

        return $products;
    }
}
