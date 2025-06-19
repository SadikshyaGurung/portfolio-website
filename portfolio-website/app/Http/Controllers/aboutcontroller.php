<?php

namespace App\Http\Controllers;

use App\Models\PersonalDetail;

class AboutController extends Controller
{
    public function index()
    {
        // Fetch the personal detail record for the user (you can display it to all users, not just authenticated)
        $personalDetail = PersonalDetail::first();  // No authentication check required

        // If personal details are not found, you can handle it by showing a message or redirecting

        // Return the 'about' view with the personal details
        return view('about', compact('personalDetail'));
    }
}
