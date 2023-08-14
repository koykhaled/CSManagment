<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::all();
        $user = Auth::user()->id;
        // foreach ($courses as $course) {
        //     echo $course->course_name;
        // }
        return view('admin.courses.index', compact('courses', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $course = Course::find($request->name);
        if ($course) {
            return redirect()->back()->with('error', 'Course is already exist');
        } else {
            Course::create([
                'name' => $request->name,
                'price' => $request->price
            ]);
            return to_route('admin.courses.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('admin.courses.edit', compact('course'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update([
            'name' => $request->name,
            'price' => $request->new_price
        ]);
        return to_route('admin.courses.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Course::findOrfail($id)->delete($id);
        return to_route('admin.courses.index');
    }
}