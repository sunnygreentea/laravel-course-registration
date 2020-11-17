<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	//$days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
    	//$times= array('8am - 10am', '9am - 11am', '1pm - 3pm', '3pm - 5pm');

        $courses = [
            [
                'id'    => 1,
                'title' => 'Algebra',
                'teacher_id' => 2,
                'category_id' => 1,
                'room_id' => 2,
                'is_featured' => 1,
                'day' => 'Monday',
                'time' => '8am - 10am',
                'description' =>$faker->paragraph.' '.$faker->paragraph,

            ],
            [
                'id'    => 2,
                'title' => 'Geometry',
                'teacher_id' => 2,
                'category_id' => 1,
                'room_id' => 2,
                'is_featured' => 0,
                'day' => 'Tuesday',
                'time' => '8am - 10am',
                'description' =>$faker->paragraph.' '.$faker->paragraph,
            ],
            [
                'id'    => 3,
                'title' => 'Chemistry',
                'teacher_id' => 3,
                'category_id' => 2,
                'room_id' => 5,
                'is_featured' => 0,
                'day' => 'Wednesday',
                'time' => '1pm - 3pm',
                'description' =>$faker->paragraph.' '.$faker->paragraph,
            ],
            [
                'id'    => 4,
                'title' => 'Physics',
                'teacher_id' => 3,
                'category_id' => 2,
                'room_id' => 4,
                'is_featured' => 0,
                'day' => 'Tuesday',
                'time' => '9am - 11am',
                'description' =>$faker->paragraph.' '.$faker->paragraph,
            ],
            [
                'id'    => 5,
                'title' => 'Web Design',
                'teacher_id' => 4,
                'category_id' => 3,
                'room_id' => 1,
                'is_featured' => 1,
                'day' => 'Tuesday',
                'time' => '3pm - 5pm',
                'description' =>$faker->paragraph.' '.$faker->paragraph,
            ],
            [
                'id'    => 6,
                'title' => 'Literature',
                'teacher_id' => 5,
                'category_id' => 4,
                'room_id' => 6,
                'is_featured' => 0,
                'day' => 'Friday',
                'time' => '3pm - 5pm',
                'description' =>$faker->paragraph.' '.$faker->paragraph,
            ],
            [
                'id'    => 7,
                'title' => 'Photography',
                'teacher_id' => 6,
                'category_id' => 5,
                'room_id' => 3,
                'is_featured' => 1,
                'day' => 'Friday',
                'time' => '1pm - 3pm',
                'description' =>$faker->paragraph.' '.$faker->paragraph,
            ],
            [
                'id'    => 8,
                'title' => 'American History',
                'teacher_id' => 6,
                'category_id' => 6,
                'room_id' => 1,
                'is_featured' => 0,
                'day' => 'Thursday',
                'time' => '9am - 11am',
                'description' =>$faker->paragraph.' '.$faker->paragraph,
            ],
           
        ];

        Course::insert($courses);
    }
}
