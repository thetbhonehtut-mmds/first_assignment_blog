<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        return [
            'author'=>$this->faker->name,
            'post_title'=>$this->faker->sentence(),
            'post_detail'=>$this->faker->paragraph(),
            'post_state' => $this->faker->boolean()==0?'FALSE':'TRUE',
            'category_id' => $category->id,
            'user_id' => $user->id,
        ];
    }
}
