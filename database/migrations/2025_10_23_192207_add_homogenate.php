<?php

declare(strict_types=1);

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $category = Category::query()->firstOrCreate([
            'title' => 'Гомогенат',
        ]);

        $product = $category->products()->create([
            'title' => '«ТРУТНЕВЫЙ ГОМОГЕНАТ»',
            'description' => '<i>однородная масса перемолотых личинок трутней</i>

Если кратко, то польза гомогената:

а) Для мужчин – при недостатке тестостерона, простатите;
б) Для студентов – для борьбы с хронической усталостью и стрессом;
в) Для женщин – при климаксе, нарушении менструального цикла;
г) Для спортсменов – месячный курс трутневого молочка явно не будет лишним с учетом высокого содержания белка, гормонов, микроэлементов и витаминов.',
        ]);
        $product->addMedia(
            public_path('assets/images/homogenate.jpg')
        )->preservingOriginal()->toMediaCollection('image');

        $product->options()->create([
            'volume' => '🫙70 мл',
            'type' => 'МЕСЯЧНЫЙ КУРС',
            'price' => 3270,
        ]);

        $product->options()->create([
            'volume' => '🫙210 мл',
            'type' => 'ГОДОВОЙ КУРС',
            'price' => 10100,
        ]);
    }
};
