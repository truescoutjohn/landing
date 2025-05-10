<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $filename = Str::uuid() . '.jpg';

        $url = 'https://picsum.photos/300/300';
        Storage::disk('public')->put("photos/$filename", file_get_contents($url));

        return [
            'first_name' => fake()->firstName(),  
            'last_name' => fake()->lastName(),    
            'email' => fake()->unique()->safeEmail(),
            'position' => fake()->jobTitle(),
            'password' => static::$password ??= Hash::make('password'),
            'avatar' => "photos/$filename"
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
