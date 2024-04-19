<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('lecturer');
    
        // Eager load the modules relationship
        $courses = Course::with('modules')->get();
    
        return view('lecturer.courses.index')->with('courses', $courses);
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('lecturer');

        return view('lecturer.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('lecturer');
    
        $request->validate([
            'course_name' => 'required',
            'credits' => 'required|numeric',
            'course_image' => 'required|image|mimes:jpeg,png,gif|max:2048',
        ]);
    
        // Store the uploaded image
        $imagePath = $request->file('course_image')->store('public/images');
    
        // Retrieve the full path
        $course_image_name = 'storage/' . substr($imagePath, 7);
    
        // Store the course data
        Course::create([
            'course_name' => $request->course_name,
            'number_of_students' => $request->number_of_students,
            'course_image' => $course_image_name,
        ]);
    
        return redirect()->route('lecturer.courses.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        $user->authorizeRoles('lecturer');

        $course = Course::findOrFail($id);
        return view('lecturer.courses.show')->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $user->authorizeRoles('lecturer');

        $course = Course::findOrFail($id);
        return view('lecturer.courses.edit')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('lecturer');

        $request->validate([
            'course_name' => 'required',
            'number_of_students' => 'required|numeric',
            'course_image' => 'image|mimes:jpeg,png,gif|max:2048',
        ]);

        $course = Course::findOrFail($id);
        $course_image_name = $course->course_image;

        if ($request->hasFile('course_image')) {
            $image = $request->file('course_image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/images', $imageName);
            $course_image_name = 'storage/images/' . $imageName;
        }

        $course->update([
            'course_name' => $request->course_name,
            'number_of_students' => $request->number_of_students,
            'course_image' => $course_image_name,
        ]);

        return redirect()->route('lecturer.courses.show', $course)->with('success', 'course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $user->authorizeRoles('lecturer');

        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('lecturer.courses.index')->with('success', 'course deleted successfully');
    }
}
