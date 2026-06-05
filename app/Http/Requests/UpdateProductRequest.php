<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'mimetypes:image/jpeg,image/png,image/gif,image/webp', 'max:5120'],
            'category_id' => ['required', 'exists:categories,id'],

            'sizes' => ['nullable', 'array'],
            'sizes.*.name' => ['nullable', 'string', 'max:255'],
            'sizes.*.extra_price' => ['nullable', 'numeric', 'min:0'],

            'crusts' => ['nullable', 'array'],
            'crusts.*.name' => ['nullable', 'string', 'max:255'],
            'crusts.*.extra_price' => ['nullable', 'numeric', 'min:0'],
        ];
    }
}
