<?php

namespace App\Http\Controllers;
use Illuminate\Http\Requests\skillrequest;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function resume()
{
    $skills = Skill::all();
    $projects = Project::all(); // Make sure you import Project model

    return view('resume', compact('skills', 'projects'));
}

    
   public function index()
{
    $skills = Skill::all();
    return view('skilldash', ['skills' => $skills]);
}



    public function add()
{
    return view('addskill'); 
}
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    Skill::create($validated);

    return redirect()->route('skilldash.index')->with('success', 'Skill added successfully!');
}


}
