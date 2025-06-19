<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Skill;
use App\Models\Project;
use App\Models\PersonalDetail;

class ResumeController extends Controller
{
   public function show() {
    $user = Auth::user();

    // Fetch personal detail record for the logged-in user
    $personalDetail = PersonalDetail::where('user_id', $user->id)->first();

    // Assuming you also fetch skills and projects as you currently do
   $skills = Skill::all();
   $projects = Project::all();
    return view('resume', compact('personalDetail', 'skills', 'projects'));
}
}
