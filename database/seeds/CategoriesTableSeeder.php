<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
         $categories = [
            [
                'id'    => 1,
                'name' => 'Math',
                'description' =>$faker->paragraph,
            ],
            [
                'id'    => 2,
                'name' => 'Science',
                'description' =>$faker->paragraph,
            ],
            [
                'id'    => 3,
                'name' => 'Computer',
                'description' =>$faker->paragraph,
            ],
            [
                'id'    => 4,
                'name' => 'English',
                'description' =>$faker->paragraph,
            ],
            [
                'id'    => 5,
                'name' => 'Art',
                'description' =>$faker->paragraph,
            ],
            [
                'id'    => 6,
                'name' => 'History',
                'description' =>$faker->paragraph,
            ],
        ];

        Category::insert($categories);
    }
}
