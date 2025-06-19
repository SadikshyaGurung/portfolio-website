<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Skill;

class ProjectController extends Controller
{
    // Show all projects with their skills
    // app/Http/Controllers/ProjectController.php

public function index()
{
    $projects = Project::with('skills')->latest()->paginate(5);

    return view('projectdash', compact('projects'));
}

    // Show the form to create project
    public function create()
    {
        $skills = Skill::all();
        return view('projectform', compact('skills'));
    }

    // Store new project with skills
    public function store(Request $request)
    {
       $validated = $request->validate([
    'project_id' => 'required|string|unique:projects,project_id',
    'title' => 'required|string|max:255',
    'description' => 'required|string',
    'skills' => 'array',
    'skills.*' => 'exists:skills,skill_id',
]);


     
       $project = Project::create([
    'project_id' => $validated['project_id'],
    'title' => $validated['title'],
    'description' => $validated['description'],
    
]);


        if (!empty($validated['skills'])) {
            $project->skills()->attach($validated['skills']);
        }

        return redirect()->route('projectdash.index')->with('success', 'Project created successfully!');
    }
    
public function destroy($id)
{
    $project = Project::findOrFail($id);
    $project->delete();

    return redirect()->route('project.index')->with('success', 'Project deleted successfully.');
}
}
