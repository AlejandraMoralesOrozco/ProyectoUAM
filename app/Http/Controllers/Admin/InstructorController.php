<?php

namespace App\Http\Controllers\Admin;

use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstructorController extends Controller
{
    public function showInstructors()
    {
        $instructors = Instructor::all();
        return view('admin.instructors.index', compact('instructors'));
    }
}

