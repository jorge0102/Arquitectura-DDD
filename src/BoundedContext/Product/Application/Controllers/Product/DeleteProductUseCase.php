<?php

namespace Src\BoundedContext\Product\Application\Controllers\Product;

use Src\BoundedContext\Product\Domain\Product\Contracts\ProductRepositoryContract;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductId;

final class DeleteProductUseCase
{
    private $repository;

    public function __construct(ProductRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $id): void
    {
        $id = new ProductId($id);

        $this->repository->delete($id);
    }
}
