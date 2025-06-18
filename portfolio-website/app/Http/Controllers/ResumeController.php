<?php
namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Project;

class ResumeController extends Controller
{
    public function show()
    {
        $skills = Skill::all();
        $projects = Project::all();

        return view('resume', compact('skills', 'projects'));
    }
}
