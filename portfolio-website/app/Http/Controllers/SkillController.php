<?php

namespace App\Http\Controllers;
use Illuminate\Http\Requests\skillrequest;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Project;
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
    $skills = Skill::paginate(5);

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


public function destroy($id)
{
    $skill = Skill::findOrFail($id);
    $skill->delete();

    return redirect()->route('skilldash.index')->with('success', 'Skill deleted successfully.');
}
}
