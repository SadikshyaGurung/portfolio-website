<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function personal()
{
    // If you want to pass data, do it here
    return view('personal'); // this should be resources/views/personal.blade.php
}

    public function dashboard()
    {
        $projectCount = Project::count();
        $skillCount = Skill::count();
       $recentProjects = Project::with('skills')->latest()->take(5)->get();

        return view('admin', compact('projectCount', 'skillCount', 'recentProjects'));
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            return response()->json(['url' => Storage::url($path)]);
        }

        return response()->json(['error' => 'No image uploaded'], 400);
    }

}

