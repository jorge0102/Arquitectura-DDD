<?php

namespace Src\BoundedContext\Product\Infrastructure\Product;

use Illuminate\Http\Request;
use Src\BoundedContext\Product\Application\Controllers\Product\DeleteProductUseCase;
use Src\BoundedContext\Product\Infrastructure\Product\Repositories\EloquentProductRepository;

class DeleteProductController
{
    private $repository;

    public function __construct(EloquentProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $id = (int)$request->id;

        $deleteProductUseCase  = new DeleteProductUseCase($this->repository);
        $deleteProductUseCase->__invoke($id);
    }
}
