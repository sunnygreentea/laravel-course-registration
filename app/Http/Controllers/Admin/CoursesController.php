<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Category;
use App\Room;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CoursesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::all();

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::all();
        $rooms = Room::all();
        $teachers = User::whereHas(
            'roles', function($q){
                $q->where('roles.id', 2);
            }
        )->get();
        return view('admin.courses.create', compact('categories', 'rooms','teachers'));
    }

    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->all());

        return redirect()->route('admin.courses.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $course = Course::find($id);
        $categories = Category::all();
        $rooms = Room::all();
        $teachers = User::whereHas(
            'roles', function($q){
                $q->where('roles.id', 2);
            }
        )->get();

        return view('admin.courses.edit', compact('course', 'categories', 'rooms','teachers'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {

        $course->update($request->all());

        return redirect()->route('admin.courses.index');
    }

    public function show(Course $course)
    {
        abort_if(Gate::denies('course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courses.show', compact('course'));
    }

    public function destroy(Course $course)
    {
        abort_if(Gate::denies('course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseRequest $request)
    {
        Course::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
