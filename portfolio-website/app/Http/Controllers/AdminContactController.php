<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    // Show all messages on the admin contact dashboard
    public function index()
    {
        $messages = Message::all();  // You can paginate if you want
        return view('admin.contactdash', compact('messages'));
    }

    // Show form to edit a message (optional)
    public function edit($id)
    {
        $message = Message::findOrFail($id);
        return view('admin.editmessage', compact('message'));
    }

    // Update a message (optional)
    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'description' => 'required|string',
        ]);

        $message->update($request->all());

        return redirect()->route('contactdash')->with('success', 'Message updated successfully!');
    }

    // Delete a message
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('contactdash')->with('success', 'Message deleted successfully!');
    }
}

