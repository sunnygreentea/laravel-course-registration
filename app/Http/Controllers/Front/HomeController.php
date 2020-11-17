<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Course;

class HomeController extends Controller
{
	public function index()
	{
		 // Categories
    	$categories = Category::all();

    	// Courses
    	$courses = Course::all();

    	// Registered courses for students
        $registeredCourses = array();
        if(auth()->user()) {
            if(auth()->user()->is_student) {
                $registeredCourses = auth()->user()->courses()->pluck('courses.id')->toArray();
            }
        }
        
        
    	return view('front.home', compact('categories', 'courses', 'registeredCourses'));
	}
   
}
