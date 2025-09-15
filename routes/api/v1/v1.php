<?php

declare(strict_types=1);

Route::prefix('categories')->as('categories:')->group(
    base_path('routes/api/v1/category.php')
);
