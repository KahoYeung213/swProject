<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('lecturer');
    
        // $modules = Module::paginate(10);
        $modules = Module::with('course')->get();

    
        return view('lecturer.modules.index')->with('modules', $modules);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('lecturer');
    
        $courses = Course::all();
        $selected = old('course_id'); // Retrieve the selected course ID from old input
    
        return view('lecturer.modules.create', compact('courses', 'selected'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $user = Auth::user();
    $user->authorizeRoles('lecturer');

    $validator = $request->validate([
        'module_name' => 'required',
        'credits' => 'required|numeric',
        'module_image' => 'required|image|mimes:jpeg,png,gif|max:2048',
    ]);

    // Validate that a course is selected
    $request->validate([
        'course_id' => 'required',
    ]);

    // Store the uploaded image
    $imagePath = $request->file('module_image')->store('public/images');

    // Retrieve the full path
    $module_image_name = 'storage/' . substr($imagePath, 7);

    // Store the module data
    Module::create([
        'module_name' => $request->module_name,
        'credits' => $request->credits,
        'module_image' => $module_image_name,
        'course_id' => $request->course_id,
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

        $module = Module::findOrFail($id);
        return view('lecturer.modules.show')->with('module', $module);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $user = Auth::user();
    $user->authorizeRoles('lecturer');

    // Fetch the Module instance with the given ID
    $module = Module::findOrFail($id);

    $courses = Course::all();

    // Pass both $module and $courses to the view
    return view('lecturer.modules.edit', compact('module', 'courses'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('lecturer');

        $request->validate([
            'module_name' => 'required',
            'credits' => 'required|numeric',
            'module_image' => 'image|mimes:jpeg,png,gif|max:2048',
            'course_id' => 'required'
        ]);

        $module = Module::findOrFail($id);
        $module_image_name = $module->module_image;

        if ($request->hasFile('module_image')) {
            $image = $request->file('module_image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/images', $imageName);
            $module_image_name = 'storage/images/' . $imageName;
        }

        $module->update([
            'module_name' => $request->module_name,
            'credits' => $request->credits,
            'module_image' => $module_image_name,
            'course_id' => $request->course_id
        ]);

        return redirect()->route('lecturer.modules.show', $module)->with('success', 'Module updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $user->authorizeRoles('lecturer');

        $module = Module::findOrFail($id);
        $module->delete();

        return redirect()->route('lecturer.modules.index')->with('success', 'Module deleted successfully');
    }
}
