<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $packages = Package::all();
        
        return view('home', compact('courses', 'packages'));
    }
}

