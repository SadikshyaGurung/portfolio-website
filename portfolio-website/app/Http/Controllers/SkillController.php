<?php

namespace App\Http\Controllers;
use Illuminate\Http\Requests\skillrequest;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    
   public function index()
{
    $skills = Skill::all();
    // dd($skills); 
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
        'skills' => 'required|string',
    ]);

    
    Skill::create($validated);

    
    return redirect()->route('skilldash.index')->with('success', 'Skill added successfully!');
}

}
