<?php

namespace Database\Factories;

use App\Models\NewsItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsItemFactory extends Factory
{
    /**
     * Specified prefix for every news item
     * Handy to use for testing purpose.
     *
     * @var string
     */
    public static $descriptionPrefix = 'TestCaseNewsItem ';

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NewsItem::class;

    /**
     * Define the model's default state.
     * Model currently defined for the NewsItemSearchTest.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->ean8,
            'published' => $this->faker->boolean,
            'description' => self::$descriptionPrefix .
                $this->faker->paragraph(2, true),
        ];
    }
}
