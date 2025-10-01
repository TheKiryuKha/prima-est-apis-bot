<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $honey = Category::create([
            'title' => 'Мёд',
        ]);

        $lining = Category::create([
            'title' => 'Забрус',
        ]);

        $polling = Category::create([
            'title' => 'Пыльца',
        ]);

        $royal_jelly = Category::create([
            'title' => 'Маточное молочко',
        ]);

        $product = Product::factory()->for($honey)->create([
            'title' => 'Мёд из Сайлент Хилла',
            'description' => 'Заброшенные шахты, туман. Окруженный терриконами город-призрак Гуково был основан в 1878 году и со временем стал прототипом вымышленного Сайлент Хилл. В нём и производится этот вкусный мёд.',
        ]);

        $product->addMedia(
            public_path('/assets/images/silent_hill.jpg')
        )->preservingOriginal()->toMediaCollection('image');

        ProductOption::factory()->for($product)->create([
            'volume' => '250 мл',
            'type' => '🫙 стекло',
            'price' => 900,
        ]);
        ProductOption::factory()->for($product)->create([
            'volume' => '1000 мл',
            'type' => '🫙 стекло',
            'price' => 2200,
        ]);
        ProductOption::factory()->for($product)->create([
            'volume' => '200 мл',
            'type' => '🍯 горшок(глина)',
            'price' => 2200,
        ]);

        $product = Product::factory()->for($honey)->create([
            'title' => 'Вечная весна',
            'description' => '<i>майский мёд</i>

Мёд - единственный продукт, не имеющий срока годности. Майский мёд не исключение, он вечный. К тому же, является деликатесом. Обладает свойством оставаться жидким (не подвержен кристаллизации), что позволяет оставлять его пчелам для прокорма прямо в сотах во время зимовки. Ничто не вечно под луной… Кроме, может, майского меда.

<i>Медоносы: черноклён, акация, фруктовый сад, черешня, малина</i>',
        ]);

        $product->addMedia(
            public_path('/assets/images/eternal_spring.jpg')
        )->preservingOriginal()->toMediaCollection('image');

        ProductOption::factory()->for($product)->create([
            'volume' => '250 мл',
            'type' => '🫙 стекло',
            'price' => 900,
        ]);
        ProductOption::factory()->for($product)->create([
            'volume' => '1000 мл',
            'type' => '🫙 стекло',
            'price' => 2200,
        ]);
        ProductOption::factory()->for($product)->create([
            'volume' => '200 мл',
            'type' => '🍯 горшок(глина)',
            'price' => 2200,
        ]);

        $product = Product::factory()->for($lining)->create([
            'title' => 'Забрус',
            'description' => '<i>медовая печатка</i>
Снимает бактериальную, инфекционную нагрузку, насыщая кровь противомикробными веществами.

Очищает дёсны, язык и щеки лучше зубной щетки.

Процесс жевания снижает уровень кортизола.

<i>Медоносы: сезонные.</i>',
        ]);

        $product->addMedia(
            public_path('/assets/images/lining_image.jpg')
        )->preservingOriginal()->toMediaCollection('image');

        ProductOption::factory()->for($product)->create([
            'volume' => '250 мл',
            'type' => '🫙 стекло',
            'price' => 590,
        ]);
        ProductOption::factory()->for($product)->create([
            'volume' => '1000 мл',
            'type' => '🫙 стекло',
            'price' => 1400,
        ]);
        ProductOption::factory()->for($product)->create([
            'volume' => '200 мл',
            'type' => '🍯 горшок(глина)',
            'price' => 900,
        ]);

        $product = Product::factory()->for($royal_jelly)->create([
            'title' => 'Маточное молочко',
            'description' => '(очень крутое описание)',
        ]);

        $product->addMedia(
            public_path('/assets/images/royal_jelly.jpg')
        )->preservingOriginal()->toMediaCollection('image');

        ProductOption::factory()->for($product)->create([
            'volume' => '250 мл',
            'type' => '🫙 стекло',
            'price' => 590,
        ]);
        ProductOption::factory()->for($product)->create([
            'volume' => '1000 мл',
            'type' => '🫙 стекло',
            'price' => 1400,
        ]);
        ProductOption::factory()->for($product)->create([
            'volume' => '200 мл',
            'type' => '🍯 горшок(глина)',
            'price' => 900,
        ]);

        $product = Product::factory()->for($polling)->create([
            'title' => 'Пыльца',
            'description' => '<i>пчелиная пыльца (обножка)</i>

Пыльца с крыльев южных эльфов не горчит и обладает исцеляющими свойствами для мышц после тренировки. Гипоаллергенна, потому ценится как средство фокусировки внимания даже среди аллергиков, тяжело переживающих цветение весны.

<i>Медоносы: акация, софлора, клевер, синяк, шалфей, донник.</i>',
        ]);

        $product->addMedia(
            public_path('/assets/images/pollen.jpg')
        )->preservingOriginal()->toMediaCollection('image');

        ProductOption::factory()->for($product)->create([
            'volume' => '100 гр',
            'type' => '📕 кр. пакет',
            'price' => 750,
        ]);
        ProductOption::factory()->for($product)->create([
            'volume' => '200 гр',
            'type' => '📕 кр. пакет',
            'price' => 1400,
        ]);
        ProductOption::factory()->for($product)->create([
            'volume' => '1000 гр',
            'type' => '📕 кр. пакет',
            'price' => 5000,
        ]);
    }
}
