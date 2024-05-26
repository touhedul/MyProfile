<?php

namespace Database\Factories;

use App\Models\CustomDomain;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomDomainFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomDomain::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
        'domain' => $this->faker->word,
        'status' => $this->faker->word,
        'is_sub_domain' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
