<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Hardware;
use Illuminate\Database\Seeder;

class HardwareSeeder extends Seeder
{
    public function run(): void
    {
        // Создаем 10 категорий
        $categories = Category::factory()->count(10)->create();
        
        // Для каждой категории создаем метизы
        $categories->each(function ($category) {
            Hardware::factory()
                ->count(rand(15, 25))
                ->create(['category_id' => $category->id]);
        });
    }
}