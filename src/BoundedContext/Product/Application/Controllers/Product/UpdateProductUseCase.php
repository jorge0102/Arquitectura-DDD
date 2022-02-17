<?php

namespace Src\BoundedContext\Product\Application\Controllers\Product;

use Src\BoundedContext\Product\Domain\Product\Contracts\ProductRepositoryContract;
use Src\BoundedContext\Product\Domain\Product\Product;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductDescription;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductEndDate;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductId;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductImage;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductName;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductPrice;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductPriceTaxesIncluded;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductStartDate;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductStatus;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductUserId;

class UpdateProductUseCase
{
    private $repository;

    public function __construct(ProductRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        int $userId,
        string  $ProductName,
        string  $ProductDescription,
        float   $ProductPrice,
        float   $ProductPriceTaxesIncluded,
        string  $ProductImage,
        int     $ProductUserId,
        bool    $ProductStatus,
        string  $ProductStartDate,
        string  $ProductEndDate,
    ): void
    {
        $id                 = new ProductId($userId);
        $name               = new ProductName($ProductName);
        $descriptions       = new ProductDescription($ProductDescription);
        $price              = new ProductPrice($ProductPrice);
        $priceTaxesIncluded = new ProductPriceTaxesIncluded($ProductPriceTaxesIncluded);
        $image              = new ProductImage($ProductImage);
        $userId             = new ProductUserId($ProductUserId);
        $status             = new ProductStatus($ProductStatus);
        $startDate          = new ProductStartDate($ProductStartDate);
        $endDate            = new ProductEndDate($ProductEndDate);

        $product = Product::create(
            $name,
            $descriptions,
            $price,
            $priceTaxesIncluded,
            $image,
            $userId,
            $status,
            $startDate,
            $endDate);


        $this->repository->update($id, $product);
    }
}
