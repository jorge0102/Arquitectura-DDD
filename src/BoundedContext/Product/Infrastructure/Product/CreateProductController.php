<?php

namespace Src\BoundedContext\Product\Infrastructure\Product;

use Illuminate\Http\Request;
use Src\BoundedContext\Product\Application\Controllers\Product\CreateProductUseCase;
use Src\BoundedContext\Product\Infrastructure\Product\Repositories\EloquentProductRepository;

final class CreateProductController
{
    private $repository;

    public function __construct(EloquentProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $name               = $request->input('name');
        $descriptions       = $request->input('descriptions');
        $price              = $request->input('price');
        $priceTaxesIncluded = $request->input('priceTaxesIncluded');
        $image              = $request->input('image');
        $userId             = $request->input('userId');
        $status             = $request->input('status');
        $startDate          = $request->input('startDate');
        $endDate            = $request->input('endDate');

        $createProductUseCase = new CreateProductUseCase($this->repository);
        $createProductUseCase->__invoke(
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


        return $request->input('userId');
    }
}
