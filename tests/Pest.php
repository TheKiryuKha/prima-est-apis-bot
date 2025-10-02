<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/

use Illuminate\Support\Sleep;

pest()->extend(Tests\TestCase::class)
    ->use(Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->beforeEach(function () {
        Str::createRandomStringsNormally();
        Str::createUuidsNormally();
        Http::preventStrayRequests();
        Sleep::fake();

        $this->freezeTime();
    })
    ->in('Feature', 'Unit');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
    // ..
}

function get_product_data(): array
{
    return
        [
            'image_link' => 'https://as1.ftcdn.net/v2/jpg/05/75/85/00/1000_F_575850011_l8mFVIrFN9fFxmWcoKEGIjM0uX181dnL.jpg',
            'title' => 'Вечная Весна',
            'description' => 'Мёд Вечная весна - вечный, как моё нытьё по этому проекту!',
            'category_title' => 'Мёд',
            'options' => [
                [
                    'type' => 'стекло',
                    'price' => 1000,
                    'volume' => '100 мл',
                ],
                [
                    'type' => 'стекло',
                    'price' => 2000,
                    'volume' => '200 мл',
                ],
                [
                    'type' => 'глина (горшок)',
                    'price' => 5000,
                    'volume' => '100 мл',
                ],
            ],
        ];
}
