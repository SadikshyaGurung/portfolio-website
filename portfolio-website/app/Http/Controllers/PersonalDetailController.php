<?php 
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PersonalDetail;  // <-- import this

class PersonalDetailController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        $personalDetail = PersonalDetail::where('user_id', $user->id)->first();
        return view('personal', compact('user', 'personalDetail'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'dob' => 'nullable|date',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

       if ($validator->fails()) {
    dd(['validation_failed' => $validator->errors()->toArray()]);
}


        $user = $request->user();
        $personalDetail = PersonalDetail::firstOrNew(['user_id' => $user->id]);
        $personalDetail->name = $request->name;
        $personalDetail->dob = $request->dob;
        $personalDetail->email = $request->email;
        $personalDetail->phone = $request->phone;
        $personalDetail->address = $request->address;
        $personalDetail->save();

        return redirect()->route('personal')->with('success', 'Details updated successfully!');
    }
}
