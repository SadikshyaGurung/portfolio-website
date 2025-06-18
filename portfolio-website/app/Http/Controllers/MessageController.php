<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $messages = message::all();
    return view('contactdash', ['messages' => $messages]);
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

    // Display all messages in the dashboard
    public function index()
    {
        $messages = Message::all();
        return view('contactdash', compact('messages'));
    }
}

