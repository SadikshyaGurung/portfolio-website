<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;

class AdminController extends Controller
{
    public function dashboard()
    {
        $projectCount = Project::count();
        $skillCount = Skill::count();
        $recentProjects = Project::latest()->take(5)->get(); // Fetch 5 most recent

        return view('admin', compact('projectCount', 'skillCount', 'recentProjects'));
    }
    
}

