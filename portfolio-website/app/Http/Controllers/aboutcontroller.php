<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\PersonalDetail;

class AboutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $personalDetail = PersonalDetail::where('user_id', $user->id)->first();

        return view('about', compact('personalDetail'));
    }
}

