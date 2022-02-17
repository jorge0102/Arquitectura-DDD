<?php

namespace Src\BoundedContext\Product\Infrastructure\Product;

use Src\BoundedContext\Product\Application\Controllers\Product\GetByIdProductUseCase;
use Src\BoundedContext\Product\Application\ViewModel\Product\GetByIdProductViewModel;
use Src\BoundedContext\Product\Infrastructure\Product\Repositories\EloquentProductRepository;

final class GetByIdProductController
{
    private $repository;

    public function __construct(EloquentProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($id)
    {
        $products = new GetByIdProductUseCase($this->repository);

        return $products->__invoke($id);
    }
}
