<?php

declare(strict_types=1);

namespace App\Actions\Product;

use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

final readonly class BulkCreateProduct
{
    /**
     * @param array<array{
     * image: UploadedFile,
     * title: string,
     * description: string,
     * category: string,
     * options: array<array{type: string, volume: string, price: int}>
     * }> $attr
     */
    public function handle(array $attr): void
    {
        DB::transaction(function () use ($attr): void {

            foreach ($attr as $data) {

                $category = Category::firstOrCreate(
                    ['title' => $data['category']]
                );

                $product = $category->products()->create([
                    'title' => $data['title'],
                    'description' => $data['description'],
                ]);

                foreach ($data['options'] as $option) {
                    $product->options()->create($option);
                }

                $product
                    ->addMedia($data['image'])
                    ->toMediaCollection('image');
            }
        });
    }
}
