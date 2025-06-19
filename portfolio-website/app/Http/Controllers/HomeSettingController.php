<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeSettingController extends Controller
{
    public function index()
    {
        $setting = HomeSetting::first();
        return view('admin.homesettings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        // Validate the form data
        $data = $request->validate([
            'welcome_heading' => 'nullable|string',
            'welcome_text' => 'nullable|string',
            'about_text' => 'nullable|string',
            'projects' => 'nullable|array',
            'projects.*.title' => 'nullable|string',
            'projects.*.image_url' => 'nullable|file|image|max:2048',
            'projects.*.description' => 'nullable|string',
        ]);

        $projects = [];
        if ($request->has('projects')) {
            foreach ($request->projects as $i => $project) {
                $proj = [
                    'title' => $project['title'] ?? '',
                    'description' => $project['description'] ?? '',
                ];

                // Handle file upload for the image URL
                if ($request->hasFile("projects.{$i}.image_url")) {
                    $file = $request->file("projects.{$i}.image_url");
                    $path = $file->store('projects', 'public');  // Store image in the 'public/projects' folder
                    $proj['image_url'] = 'storage/' . $path;
                } elseif (!empty($project['existing_image_url'])) {
                    // If no new image uploaded, keep the existing image URL
                    $proj['image_url'] = $project['existing_image_url'];
                } else {
                    $proj['image_url'] = '';
                }

                $projects[] = $proj;
            }
        }

        // Add featured projects to the data array
        $data['featured_projects'] = $projects;
        unset($data['projects']);  // Remove the projects from the array, we already added them

        // Update the home settings or create new if none exists
        HomeSetting::updateOrCreate([], $data);

        // Redirect back with a success message
       return redirect()->route('/')->with('success', 'updated successfully!');
    }
}
