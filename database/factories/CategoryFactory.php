<?php
namespace Database\Factories;

use App\Models\Category; // Убедитесь, что эта строка есть
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class; // Добавьте эту строку

    public function definition(): array
    {
        $categories = ['Болты', 'Гайки', 'Шайбы', 'Саморезы', 'Дюбели', 'Шурупы', 'Анкеры', 'Заклепки', 'Шпильки', 'Гвозди'];
        
        return [
            'name' => $this->faker->unique()->randomElement($categories),
            'type' => 'hardware',
        ];
    }
}