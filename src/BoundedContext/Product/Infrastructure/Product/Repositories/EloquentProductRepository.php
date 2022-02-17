<?php

namespace Src\BoundedContext\Product\Infrastructure\Product\Repositories;

use App\Models\Product as EloquentProductModel;
use Src\BoundedContext\Product\Domain\Product\Contracts\ProductRepositoryContract;
use Src\BoundedContext\Product\Domain\Product\Product;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductId;
use Src\BoundedContext\Product\Domain\Product\ValueObjects\ProductUserId;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserId;

final class EloquentProductRepository implements ProductRepositoryContract
{
    private $eloquentProductModel;

    public function __construct()
    {
        $this->eloquentProductModel = new EloquentProductModel;
    }

    public function allByUserProducts(ProductUserId $id): ?object
    {
        $products = $this->eloquentProductModel
            ->where('user_id', $id->value())
            ->get();

        return $products;
    }

    public function getByIdProducts(ProductId $id): ?object
    {
        $products = $this->eloquentProductModel
            ->where('id', $id->value())
            ->get();

        return $products;
    }

    public function save(Product $product): void
    {
        $newProduct = $this->eloquentProductModel;

        $data = [
            'name' => $product->name()->value(),
            'descriptions' => $product->descriptions()->value(),
            'price' => $product->price()->value(),
            'price_taxes_included' => $product->priceTaxesIncluded()->value(),
            'image' => $product->image()->value(),
            'user_id' => $product->userId()->value(),
            'status' => $product->status()->value(),
            'start_date' => $product->startDate()->value(),
            'end_date' => $product->endDate()->value(),
        ];

        $newProduct->create($data);
    }

    public function update(ProductId $id, Product $product): void
    {
        $newProduct = $this->eloquentProductModel;

        $data = [
            'name' => $product->name()->value(),
            'descriptions' => $product->descriptions()->value(),
            'price' => $product->price()->value(),
            'price_taxes_included' => $product->priceTaxesIncluded()->value(),
            'image' => $product->image()->value(),
            'user_id' => $product->userId()->value(),
            'status' => $product->status()->value(),
            'start_date' => $product->startDate()->value(),
            'end_date' => $product->endDate()->value(),
        ];

        $newProduct
            ->findOrFail($id->value())
            ->update($data);
    }

    public function delete(ProductId $id): void
    {
        $this->eloquentProductModel
            ->findOrFail($id->value())
            ->delete();
    }
}
