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
        $request->validate([
            'project_id' => 'required|unique:projects',
            'title' => 'required',
            'description' => 'required',
            'skills' => 'required|array'
        ]);

        Project::create([
            'project_id' => $request->project_id,
            'title' => $request->title,
            'description' => $request->description,
            'skills' => implode(',', $request->skills),
        ]);

        return redirect()->route('projectdash.index')->with('success', 'Project created!');
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
            'title' => 'required',
            'description' => 'required',
            'skills' => 'required|array'
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
