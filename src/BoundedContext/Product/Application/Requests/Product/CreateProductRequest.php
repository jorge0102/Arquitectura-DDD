<?php

namespace Src\BoundedContext\Product\Application\Requests\Product;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use function response;

class CreateProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['string', 'required'],
            'descriptions' => ['string', 'required'],
            'price' => ['numeric', 'required'],
            'priceTaxesIncluded' => ['numeric', 'required'],
            'image' => ['string', 'required'],
            'userId' => ['integer', 'required'],
            'status' => ['boolean', 'required'],
            'startDate' => ['date_format:Y-m-d', 'required'],
            'endDate' => ['date_format:Y-m-d', 'required'],
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
