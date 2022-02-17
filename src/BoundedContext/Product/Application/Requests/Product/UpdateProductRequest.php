<?php

namespace Src\BoundedContext\Product\Application\Requests\Product;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['string'],
            'descriptions' => ['string'],
            'price' => ['numeric'],
            'priceTaxesIncluded' => ['numeric'],
            'image' => ['string'],
            'userId' => ['integer'],
            'status' => ['boolean'],
            'startDate' => ['date_format:Y-m-d'],
            'endDate' => ['date_format:Y-m-d'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation error',
            'data' => $validator->errors()
        ]));
    }
}
