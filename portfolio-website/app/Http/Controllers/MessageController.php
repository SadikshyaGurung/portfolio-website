<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;  // Make sure to import the model

class MessageController extends Controller
{
    // Display all messages in the dashboard
    public function index()
    {
        $messages = Message::all();
        return view('contactdash', compact('messages'));
    }
    public function showForm()
    {
        return view('contact'); // or 'contact.index' depending on your file
    }

    // Store the message in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'description' => 'required|string|max:500',
        ]);

        $message = new Message();
        $message->name = $validated['name'];
        $message->email = $validated['email'];
        $message->description = $validated['description'];
        $message->save();

        return redirect()->route('contact')->with('success', 'Your message has been sent!');
    }
    public function submit(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    Message::create([
        'name' => $request->name,
        'email' => $request->email,
        'description' => $request->message, // store message text here
    ]);

    return redirect()->back()->with('success', 'Thank you for your message!');
}


}
