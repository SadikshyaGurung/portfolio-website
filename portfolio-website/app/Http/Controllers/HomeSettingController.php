<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    public function index()
    {
        $setting = HomeSetting::first();
        return view('admin.homesettings.index', compact('setting'));
    }

    public function update(Request $request)
    {
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

                // Handle file upload
                if (isset($project['image_url']) && $project['image_url'] instanceof \Illuminate\Http\UploadedFile) {
                    $path = $project['image_url']->store('projects', 'public');
                    $proj['image_url'] = 'storage/' . $path;
                } elseif (isset($project['existing_image_url'])) {
                    // Keep existing image if no new file uploaded
                    $proj['image_url'] = $project['existing_image_url'];
                } else {
                    $proj['image_url'] = '';
                }

                $projects[] = $proj;
            }
        }

        $data['featured_projects'] = $projects;
        unset($data['projects']);

        HomeSetting::updateOrCreate([], $data);

        return back()->with('success', 'Homepage settings saved.');
    }

}
