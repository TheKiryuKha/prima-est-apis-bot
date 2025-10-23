<?php

declare(strict_types=1);

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $category = Category::query()->firstOrCreate([
            'title' => 'Мёд',
        ]);

        $product = $category->products()->create([
            'title' => '«ПЕТУШИНЫЙ МЁД»',
            'description' => '<i>луговой мёд (разнотравье) с подсолнухом</i>

Петух - символ борьбы и боя. Древние викинги становились берсерками вовсе не из-за мухоморов, а белены. Она позволяла берсеркам не чувствовать боль в сражениях. Выживших берсерков лечили мёдом. Викинги обрабатывали им раны и порезы. Нанесение мёда на поврежденную кожу предотвращало инфекции и способствовало заживлению ран.

<i>Медоносы: подсолнух, синяк, сурепка, фацелия, донник</i>',
        ]);
        $product->addMedia(
            public_path('assets/images/cock.jpg')
        )->preservingOriginal()->toMediaCollection('image');

        $product->options()->create([
            'volume' => '🫙250 мл',
            'type' => 'стекло',
            'price' => 800,
        ]);

        $product->options()->create([
            'volume' => '🫙500 мл',
            'type' => 'стекло',
            'price' => 1400,
        ]);

        $product->options()->create([
            'volume' => '🫙1000 мл',
            'type' => 'стекло',
            'price' => 2200,
        ]);
    }
};
