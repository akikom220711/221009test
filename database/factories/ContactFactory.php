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
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'fullname' => $this->faker->unique()->name(),
            'gender' => $this->faker->numberBetween(1,2),
            'email' => $this->faker->unique()->safeEmail(),
            'postcode' => $this->faker->postcode(),
            'address' => $this->faker->streetAddress(),
            'building_name' => $this->faker->sentence(),
            'opinion' => $this->faker->sentence()
        ];
    }
}
