<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new \Mmo\Faker\PicsumProvider($this->faker));
        return [
            'titulo'=>ucfirst($this->faker->unique()->words(random_int(2,4), true)),
            'contenido'=>$this->faker->text(),
            'estado'=>random_int(1,2),
            //imgarticles/48383838383.jpg
            'imagen'=>'imgarticles/'.$this->faker->picsum($dir = 'public/storage/imgarticles', $width = 640, $height = 480, $fullPath = false),
            'user_id'=>User::all()->random()->id
        ];
    }
}
