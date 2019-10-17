<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * @param Faker $faker
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('categories')->insert([
                'name'        => $faker->word,
                'description' => $faker->text,
            ]);
        }
    }
}
