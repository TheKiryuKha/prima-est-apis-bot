<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table): void {
            $table->id();

            $table->string('title');
            $table->string('type');

            $table->string('status');
            $table->text('description');

            $table->unsignedInteger('amount');
            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnUpdate();

            $table->timestamps();
        });
    }
};
