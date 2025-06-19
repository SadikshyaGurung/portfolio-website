<?php
namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Project;
use App\Models\PersonalDetail;

class ResumeController extends Controller
{
    public function show()
    {
        // Fetch personal detail record for any user (not necessarily the authenticated one)
        $personalDetail = PersonalDetail::first();  // Or any other logic to fetch personal details

        // Handle case where personal details might not exist
        if (!$personalDetail) {
            return redirect()->route('home')->with('error', 'Personal details not found.');
        }

        // Fetch all skills and projects (accessible to everyone)
        $skills = Skill::all();
        $projects = Project::all();

        // Return the view with the data
        return view('resume', compact('personalDetail', 'skills', 'projects'));
    }
}
