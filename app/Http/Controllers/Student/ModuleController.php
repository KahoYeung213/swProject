<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Module;
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
        $user->authorizeRoles('student');
    
        $modules = Module::paginate(10);
    
        return view('student.modules.index')->with('modules', $modules);
    }

   
    public function show($id)
    {
        $user = Auth::user();
        $user->authorizeRoles('student');

        $module = Module::findOrFail($id);
        return view('student.modules.show')->with('module', $module);
    }
}