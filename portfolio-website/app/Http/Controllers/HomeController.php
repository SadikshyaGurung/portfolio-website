<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $settings = HomeSetting::firstOrNew([]);
        // return view('home', compact('settings'));

        $settings = HomeSetting::first();
        return view('home', ['settings' => $settings]);
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
            'projects' => 'nullable|array',
            'projects.*.title' => 'required_with:projects|string|max:255',
            'projects.*.image_url' => 'required_with:projects|url',
            'projects.*.description' => 'required_with:projects|string',
        ]);

        HomeSetting::updateOrCreate([], [
            'welcome_heading' => $data['welcome_heading'] ?? null,
            'welcome_text' => $data['welcome_text'] ?? null,
            'about_text' => $data['about_text'] ?? null,
            'featured_projects' => $data['projects'] ?? [],
        ]);

        return redirect()->route('home.edit')->with('success', 'Updated successfully!');
    }
}
