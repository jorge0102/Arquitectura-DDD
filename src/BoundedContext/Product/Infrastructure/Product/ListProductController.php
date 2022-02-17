<?php

namespace Src\BoundedContext\Product\Infrastructure\Product;

use Src\BoundedContext\Product\Application\Controllers\Product\GetAllByUserProductCase;
use Src\BoundedContext\Product\Infrastructure\Product\Repositories\EloquentProductRepository;

final class ListProductController
{
    private $repository;

    public function __construct(EloquentProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($id)
    {
        $products = new GetAllByUserProductCase($this->repository);

        return $products->__invoke($id);
    }
}
