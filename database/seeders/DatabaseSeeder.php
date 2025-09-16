<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $honey = Category::factory()->create([
            'title' => 'Мёд'
        ]);

        $lining = Category::factory()->create([
            'title' => 'Забрус'
        ]);
        
        $pollen = Category::factory()->create([
            'title' => 'Пыльца'
        ]);


        $product = Product::factory()->for($honey)->create([
            'title' => '«ВЕЧНАЯ ВЕСНА»',
            'type' => 'майский мёд',
            'description' => 'Мёд - единственный продукт, не имеющий срока годности. Майский мёд не исключение, он вечный. К тому же, является деликатесом. Обладает свойством оставаться жидким (не подвержен кристаллизации), что позволяет оставлять его пчелам для прокорма прямо в сотах во время зимовки. Ничто не вечно под луной… Кроме, может, майского меда.',
            // 'honey_plants' => 'черноклён, акация, фруктовый сад, черешня, малина',
        ]);

        ProductOption::factory()->for($product)->create([
            'volume' => '250 мл',
            'price' => '900',
            'type' => 'стекло'
        ]);
        
        ProductOption::factory()->for($product)->create([
            'volume' => '1000 мл',
            'price' => '2200',
            'type' => 'стекло'
        ]);
        
        ProductOption::factory()->for($product)->create([
            'volume' => '200 мл',
            'price' => '1200',
            'type' => 'глина(горшок)'
        ]);
        
        $product = Product::factory()->for($honey)->create([
            'title' => '«МЁД ИЗ САЙЛЕНТ ХИЛЛА»',
            'type' => 'луговой мёд (разнотравье)',
            'description' => 'Заброшенные шахты, туман. Окруженный терриконами город-призрак Гуково был основан в 1878 году и со временем стал прототипом вымышленного Сайлент Хилл. В нём и производится этот вкусный мёд.',
            // 'honey_plants' => 'Медоносы: сафлора, синяк, шалфей, донник',
        ]);

        ProductOption::factory()->for($product)->create([
            'volume' => '250 мл',
            'price' => '900',
            'type' => 'стекло'
        ]);
        
        ProductOption::factory()->for($product)->create([
            'volume' => '1000 мл',
            'price' => '2200',
            'type' => 'стекло'
        ]);
        
        ProductOption::factory()->for($product)->create([
            'volume' => '200 мл',
            'price' => '1200',
            'type' => 'глина(горшок)'
        ]);
        
        $product = Product::factory()->for($honey)->create([
            'title' => '«ДРЕВНИЙ МЁД»',
            'type' => 'липовый мёд',
            'description' => 'Боржоми - это не только бутылка минералки. Самый старый 5500-летний мед был найден на месте захоронения именно в городе Боржоми (Грузия), а не в Египте. В разграбленной гробнице обнаружили керамические сосуды с остатками меда, ритуально оставленным для будущих загробных трапез. По результатам биологического анализа мёд был липовым.',
            // 'honey_plants' => 'липа',
        ]);

        ProductOption::factory()->for($product)->create([
            'volume' => '250 мл',
            'price' => '900',
            'type' => 'стекло'
        ]);
        
        ProductOption::factory()->for($product)->create([
            'volume' => '1000 мл',
            'price' => '2200',
            'type' => 'стекло'
        ]);
        
        ProductOption::factory()->for($product)->create([
            'volume' => '200 мл',
            'price' => '1200',
            'type' => 'глина(горшок)'
        ]);

        $product = Product::factory()->for($pollen)->create([
            'title' => '«ПЫЛЬЦА ЧЁРНОГО МЕЧНИКА»',
            'type' => 'пчелиная пыльца (обножка)',
            'description' => 'Пыльца с крыльев южных эльфов не горчит и обладает исцеляющими свойствами для мышц после тренировки. Гипоаллергенна, потому ценится как средство фокусировки внимания даже среди аллергиков, тяжело переживающих цветение весны.',
            // 'honey_plants' => 'акация, софлора, клевер, синяк, шалфей, донник.',
        ]);

        ProductOption::factory()->for($product)->create([
            'volume' => '100 гр',
            'price' => '750',
            'type' => 'кр. пакет'
        ]);
        
        ProductOption::factory()->for($product)->create([
            'volume' => '200 гр',
            'price' => '1400',
            'type' => 'кр. пакет'
        ]);
        
        ProductOption::factory()->for($product)->create([
            'volume' => '1000 гр',
            'price' => '5000',
            'type' => 'кр. пакет'
        ]);

        $product = Product::factory()->for($honey)->create([
            'title' => '«ЗАБРУС»',
            'type' => 'медовая печатка',
            'description' => 'Снимает бактериальную, инфекционную нагрузку, насыщая кровь противомикробными веществами.

                Очищает дёсны, язык и щеки лучше зубной щетки.

                Процесс жевания снижает уровень кортизола.',
            // 'honey_plants' => 'Медоносы: сезонные.',
        ]);

        ProductOption::factory()->for($product)->create([
            'volume' => '250 мл',
            'price' => '590',
            'type' => 'стекло'
        ]);
        
        ProductOption::factory()->for($product)->create([
            'volume' => '1000 мл',
            'price' => '1400',
            'type' => 'стекло'
        ]);
        
        ProductOption::factory()->for($product)->create([
            'volume' => '200 мл',
            'price' => '900',
            'type' => 'глина(горшок)'
        ]);
    }   

}
