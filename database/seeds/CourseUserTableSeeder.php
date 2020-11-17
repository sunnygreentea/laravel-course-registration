<?php

use Illuminate\Database\Seeder;
use App\User;

class CourseUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
    	// Courses
    	$allCourses = array(1,2,3,4,5,6,7,8);

        // 20 students
         for ($i=8; $i<=27; $i++) {
         	// make random order of all courses
         	shuffle($allCourses);
         	$number = rand(1,6);
         	// Get random number of courses as the student registered
         	// each student has registered 2-7 courses
         	$courses = array_slice($allCourses,$number);
         	User::findOrFail($i)->courses()->sync($courses);
         }
    }
}
