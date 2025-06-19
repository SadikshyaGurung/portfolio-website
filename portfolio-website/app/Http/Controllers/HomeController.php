<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use Illuminate\Http\Request;
use App\Models\Project;
class HomeController extends Controller
{
    // Display home settings
    public function index()
    {
        // Fetch the first settings or set default values if not found
        $settings = HomeSetting::first();
         $projects = Project::all();
        if (!$settings) {
            // Set default values in case there are no settings
            $settings = new HomeSetting([
                'welcome_heading' => 'Welcome to My Portfolio',
                'welcome_text' => 'Some default welcome text here.'
            ]);
        }

        // Pass the settings to the view
        return view('home', compact('settings','projects'));
    }

    // Show the home settings edit form
    public function edit()
    {
        // Fetch the first settings, or create a new one if it doesn't exist
        $settings = HomeSetting::firstOrNew([]);

        return view('home_edit', compact('settings'));
    }

    // Handle the update of home settings
    public function update(Request $r)
    {
        // Validate the incoming request
        $data = $r->validate([
            'welcome_heading' => 'nullable|string|max:255',
            'welcome_text' => 'nullable|string',
            'about_text' => 'nullable|string',
        ]);

        // Update or create the home settings
        HomeSetting::updateOrCreate([], $data);

        // Redirect back to the edit page with a success message
        return redirect()->route('home.edit')->with('success', 'Updated successfully!');
    }
}
