<?php

namespace Src\BoundedContext\Product\Infrastructure\Product;

use Illuminate\Http\Request;
use Src\BoundedContext\Product\Application\Controllers\Product\GetAllByUserProductCase;
use Src\BoundedContext\Product\Application\Controllers\Product\GetByIdProductUseCase;
use Src\BoundedContext\Product\Application\Controllers\Product\UpdateProductUseCase;
use Src\BoundedContext\Product\Infrastructure\Product\Repositories\EloquentProductRepository;

class UpdateProductController
{
    private $repository;

    public function __construct(EloquentProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $id = (int)$request->id;

        $getProductUseCase  = new GetByIdProductUseCase($this->repository);
        $product            = $getProductUseCase->__invoke($id);

        $name               = $request->input('name') ?? $product[0]->name;
        $descriptions       = $request->input('descriptions') ?? $product[0]->descriptions;
        $price              = $request->input('price') ?? $product[0]->price;
        $priceTaxesIncluded = $request->input('priceTaxesIncluded') ?? $product[0]->priceTaxesIncluded;
        $image              = $request->input('image') ?? $product[0]->image;
        $userId             = $request->input('userId') ?? $product[0]->userId;
        $status             = $request->input('status') ?? $product[0]->status;
        $startDate          = $request->input('startDate') ?? $product[0]->startDate;
        $endDate            = $request->input('endDate') ?? $product[0]->endDate;

        $updateProductUseCase = new UpdateProductUseCase($this->repository);
        $updateProductUseCase->__invoke(
            $id,
            $name,
            $descriptions,
            $price,
            $priceTaxesIncluded,
            $image,
            $userId,
            $status,
            $startDate,
            $endDate
        );
    }
}
