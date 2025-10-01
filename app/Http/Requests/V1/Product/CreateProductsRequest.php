<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

final class CreateProductsRequest extends FormRequest
{
    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            '*.image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            '*.title' => 'required|string|max:255',
            '*.description' => 'required|string',
            '*.category' => 'required|string|max:255',
            '*.options' => 'required|array|min:1',
            '*.options.*.type' => 'required|string|max:255',
            '*.options.*.price' => 'required|integer|min:0',
            '*.options.*.volume' => 'required|string',
        ];
    }

    /**
     * @return array<array{
     * image: UploadedFile,
     * title: string,
     * description: string,
     * category: string,
     * options: array<array{type: string, volume: string, price: int}>
     * }>
     */
    public function validated($key = null, $default = null): array
    {
        /**
         * @var array<array{
         * image: UploadedFile,
         * title: string,
         * description: string,
         * category: string,
         * options: array<array{type: string, volume: string, price: int}>
         * }> $data
         */
        $data = parent::validated($key);

        return $data;
    }
}
