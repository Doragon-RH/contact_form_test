<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        $nameParts = explode(' ', $name, 2);
        return [
            'first_name' => $nameParts[0],
            'last_name' => $nameParts[1] ?? '',
            'category_id' => $this->faker->numberBetween(1,5),
            'email' => $this->faker->safeEmail(),
            'gender' => $this->faker->numberBetween(1,3),
            'tel' => $this->faker->shuffle('0123456789'),
            'address' => $this->faker->city(),
            'building' => $this->faker->word(),
            'detail' => $this->faker->text(120),
        ];
    }
}
