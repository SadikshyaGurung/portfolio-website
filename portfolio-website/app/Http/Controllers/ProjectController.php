<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Skill;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projectdash', compact('projects'));
    }

    public function create()
    {
        $skills = Skill::all();
        return view('projectform', compact('skills'));
    }

 public function store(Request $request)
{
    // Validate incoming request data (optional but recommended)
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Store the uploaded image in storage/app/public/images and get the path
    $path = $request->file('image')->store('images', 'public');

    // Create and save the project
   $project = new Project();

$project->project_id = $request->input('project_id'); // <-- assign this
$project->title = $request->title;
$project->description = $request->description;
$project->image = $path;

$project->save();

    // Redirect back or to some page with success message
    return redirect()->route('project')->with('success', 'Project created successfully!');
}
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $skills = Skill::all();
        return view('editproject', compact('project', 'skills'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

       $request->validate([
    'project_id' => 'required|integer|unique:projects,project_id',
    'title' => 'required|string|max:255',
    'description' => 'required|string',
    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
]);


        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'skills' => implode(',', $request->skills),
        ]);

        return redirect()->route('projectdash.index')->with('success', 'Project updated!');
    }

    public function destroy($id)
    {
        Project::destroy($id);
        return redirect()->route('projectdash.index')->with('success', 'Project deleted!');
    }
}
