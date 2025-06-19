<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PersonalDetail;

class PersonalDetailController extends Controller
{
    // Show personal details to the user (both authenticated and non-authenticated users)
    public function personal()
    {
        // Fetch the personal detail record for the logged-in user
        $user = auth()->user();
        $personalDetail = PersonalDetail::where('user_id', $user->id)->first();

        if (!$personalDetail) {
            return redirect()->route('home')->with('error', 'Personal details not found.');
        }

        return view('personal', compact('user', 'personalDetail'));
    }

    // Show the edit form for personal details
    public function edit()
    {
        $user = auth()->user();
        $personalDetail = PersonalDetail::where('user_id', $user->id)->first();
        return view('personal.edit', compact('user', 'personalDetail'));
    }

    // Handle the submission of the edit form (update personal details)
    public function update(Request $request)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'dob' => 'nullable|date',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('personal.edit')->withErrors($validator)->withInput();
        }

        // Get the authenticated user and update their personal details
        $user = $request->user();
        $personalDetail = PersonalDetail::firstOrNew(['user_id' => $user->id]);

        $personalDetail->name = $request->name;
        $personalDetail->dob = $request->dob;
        $personalDetail->email = $request->email;
        $personalDetail->phone = $request->phone;
        $personalDetail->address = $request->address;
        $personalDetail->save();

        // Redirect back to the personal details page with a success message
        return redirect()->route('personal')->with('success', 'Personal details updated successfully!');
    }
}
