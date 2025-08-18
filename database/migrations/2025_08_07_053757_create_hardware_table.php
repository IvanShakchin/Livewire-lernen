<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hardwares', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sku')->unique()->comment('Артикул');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->comment('Цена');
            $table->string('unit')->default('шт.')->comment('Единица измерения');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('image')->nullable()->comment('Изображение');
            $table->timestamps();
            
            // Индексы для оптимизации
            $table->index('category_id');
            $table->index('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware');
    }
};
