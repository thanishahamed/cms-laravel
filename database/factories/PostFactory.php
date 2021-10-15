<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use League\CommonMark\Node\Block\Paragraph;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->factory(),
            'title' => $this->faker->sentence,
            'post_image' => $this->imageUrl('900', '800'),
            'body' => $this->faker->paragraph
        ];
    }
}
