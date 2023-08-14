<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index()
    {
        return view('dashboard');
    }
    public function viewCourses()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    public function viewStudents()
    {
        $students = User::whereHas(
            'roles',
            function ($query) {
                $query->where('name', 'student');
            }
        )->get();

        return view('admin.students.index', compact('students'));
    }
}