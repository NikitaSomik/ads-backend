<?php

declare(strict_types=1);

namespace Modules\Ad\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ad\Models\Ad;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdFactory extends Factory
{

    protected $model = Ad::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'impressions' => $this->faker->numberBetween(100, 10000),
            'clicks' => $this->faker->numberBetween(10, 1000),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
