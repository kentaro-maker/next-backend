<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Meal;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $meal = Meal::inRandomOrder()->first();
        $author_id = $meal->author_id;
        $commenter = User::inRandomOrder()->firstWhere('id', '<>', $author_id);

        return [
            'meal_id' =>  $meal->id,
            'commenter_id' => $commenter->id,
            'reply' => fake()->realText(40),
        ];
    }
}
