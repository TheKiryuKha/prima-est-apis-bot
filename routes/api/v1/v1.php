<?php

declare(strict_types=1);

Route::prefix('categories')->as('categories:')->group(
    base_path('routes/api/v1/category.php')
);

Route::prefix('products')->as('products:')->group(
    base_path('routes/api/v1/product.php')
);

Route::prefix('users')->as('users:')->group(
    base_path('routes/api/v1/user.php')
);

Route::prefix('cart_items')->as('cart_items:')->group(
    base_path('routes/api/v1/cart_item.php')
);
