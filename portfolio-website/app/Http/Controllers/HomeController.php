<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        // $settings = HomeSetting::firstOrNew([]);
        // return view('home', compact('settings'));

        $settings = HomeSetting::first();
        return view('home', ['settings' => $settings]);
=======
        $settings = HomeSetting::firstOrNew([]);

        // Fetch the latest 4 projects from the database
        $projects = Project::latest()->take(4)->get();

        return view('home', compact('settings', 'projects'));
>>>>>>> bc10d940fff07c570c94dd80b1fe18ea4a312346
    }

    public function edit()
    {
        $settings = HomeSetting::firstOrNew([]);
        return view('home_edit', compact('settings'));
    }

    public function update(Request $r)
    {
        $data = $r->validate([
            'welcome_heading' => 'nullable|string|max:255',
            'welcome_text' => 'nullable|string',
            'about_text' => 'nullable|string',
        ]);

        HomeSetting::updateOrCreate([], $data);

        return redirect()->route('home.edit')->with('success', 'Updated successfully!');
    }
}
