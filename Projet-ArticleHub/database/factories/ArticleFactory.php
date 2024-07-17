<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            'titre' => $this->faker->unique()->sentence,
            'contenu' => $this->faker->paragraphs(3, true),
            'small_description' => $this->faker->sentence,
            'date_publication' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'utilisateur_id' => \App\Models\User::inRandomOrder()->first()->id,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Article $article) {
            $categories = Category::inRandomOrder()->limit(3)->pluck('id')->toArray(); // Adjust limit as needed
            $article->categories()->sync($categories);
        });
    }
}
