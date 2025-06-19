<?php 
namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Other methods...
    

    // Show the edit form
    public function edit($id)
    {
        $message = Message::findOrFail($id);
        return view('edit-message', compact('message')); // Create an 'edit-message' view
    }

    // Update the message
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string|max:500',  // 'message' is coming from the form field
    ]);

    // Create new message from the form data
    $message = new Message();
    $message->name = $request->name;
    $message->email = $request->email;
    $message->description = $request->message;  // Use 'message' field from the form
    $message->save();

    // Redirect to the contact dashboard with success message
    return redirect()->route('contactdash')->with('success', 'Message sent successfully!');
}
}