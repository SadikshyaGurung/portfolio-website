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
            'featured_projects' => 'nullable|array',
        ]);

        HomeSetting::updateOrCreate([], $data);

        return back()->with('success', 'Homepage settings saved.');
    }
}
