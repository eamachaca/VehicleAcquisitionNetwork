<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Comment::count() + 1,
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'body' => $this->faker->sentence(50),
            'post_id' => Post::inRandomOrder()->first()->id, //ignoring if call from relationships
        ];
    }
}
