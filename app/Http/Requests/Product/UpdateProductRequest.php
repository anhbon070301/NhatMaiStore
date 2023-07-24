<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required|string',
            'price' => 'required|numeric' . ($this->input("old_price") ? "|max:" . $this->input("old_price") : ""),
            'description' => 'required',
            'sort_order' => 'required|numeric'
        ];
    }
}
