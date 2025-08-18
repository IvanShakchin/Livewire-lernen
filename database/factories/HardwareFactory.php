<?php
namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class HardwareFactory extends Factory
{
    public function definition(): array
    {
        $units = ['шт.', 'кг', 'м', 'упак.', 'набор'];
        $titles = [
            'Болт М6', 'Гайка М8', 'Шайба пружинная', 'Саморез по дереву', 'Дюбель распорный',
            'Шуруп кровельный', 'Анкер клиновой', 'Заклепка алюминиевая', 'Шпилька резьбовая', 'Гвоздь строительный'
        ];
        
        return [
            'title' => $this->faker->randomElement($titles) . ' ' . $this->faker->randomElement(['', 'оцинкованный', 'нержавеющий', 'желтый', 'черный']),
            'sku' => 'MET-' . $this->faker->unique()->randomNumber(6),
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->randomFloat(2, 0.5, 150),
            'unit' => $this->faker->randomElement($units),
            'category_id' => Category::inRandomOrder()->first()->id,
            'image' => null,
        ];
    }
}