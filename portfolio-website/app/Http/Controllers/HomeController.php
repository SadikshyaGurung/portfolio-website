<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index() {
    $settings = HomeSetting::first();  // or however you fetch the settings
    
    // Always check if $settings is found to avoid null errors
    if (!$settings) {
        // You can set a default or create one on the fly
        $settings = new HomeSetting([
            'welcome_heading' => 'Welcome to My Portfolio',
            'welcome_text' => 'Some default welcome text here.'
        ]);
    }

    return view('home', compact('settings'));
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
