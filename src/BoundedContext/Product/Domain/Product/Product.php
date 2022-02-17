<?php

namespace Src\BoundedContext\Product\Domain\Product;


use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductDescription;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductEndDate;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductImage;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductName;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductPrice;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductPriceTaxesIncluded;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductStartDate;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductStatus;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductUserId;

final class Product
{
    private $name;
    private $descriptions;
    private $price;
    private $priceTaxesIncluded;
    private $image;
    private $userId;
    private $status;
    private $startDate;
    private $endDate;

    public function __construct(
        ProductName               $name,
        ProductDescription        $descriptions,
        ProductPrice              $price,
        ProductPriceTaxesIncluded $priceTaxesIncluded,
        ProductImage              $image,
        ProductUserId             $userId,
        ProductStatus             $status,
        ProductStartDate          $startDate,
        ProductEndDate            $endDate
    )
    {
        $this->name = $name;
        $this->descriptions = $descriptions;
        $this->price = $price;
        $this->priceTaxesIncluded = $priceTaxesIncluded;
        $this->image = $image;
        $this->userId = $userId;
        $this->status = $status;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function name(): ProductName
    {
        return $this->name;
    }

    public function descriptions(): ProductDescription
    {
        return $this->descriptions;
    }

    public function price(): ProductPrice
    {
        return $this->price;
    }

    public function priceTaxesIncluded(): ProductPriceTaxesIncluded
    {
        return $this->priceTaxesIncluded;
    }

    public function image(): ProductImage
    {
        return $this->image;
    }

    public function userId(): ProductUserId
    {
        return $this->userId;
    }

    public function status(): ProductStatus
    {
        return $this->status;
    }

    public function startDate(): ProductStartDate
    {
        return $this->startDate;
    }

    public function endDate(): ProductEndDate
    {
        return $this->endDate;
    }

    public static function create(
        ProductName               $name,
        ProductDescription        $descriptions,
        ProductPrice              $price,
        ProductPriceTaxesIncluded $priceTaxesIncluded,
        ProductImage              $image,
        ProductUserId             $userId,
        ProductStatus             $status,
        ProductStartDate          $startDate,
        ProductEndDate            $endDate,
    ): Product
    {
        $product = new self(
            $name,
            $descriptions,
            $price,
            $priceTaxesIncluded,
            $image,
            $userId,
            $status,
            $startDate,
            $endDate);

        return $product;
    }

}
