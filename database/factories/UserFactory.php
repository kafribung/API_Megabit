<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username'        => $this->faker->unique()->firstNameMale,
            'fullname'        => $this->faker->name,
            'birth_of_date'   => $this->faker->date(),
            'birth_of_place'  => $this->faker->state(),
            'password'        => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'gender'          => 'Pria',
            'role'            => 1,
            'remember_token'  => Str::random(10),
        ];
    }
}
