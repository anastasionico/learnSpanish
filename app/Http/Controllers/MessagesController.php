<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function store(Request $request)
    {
     	$request->validate([
            'name' => ['required','string'],
            'email' => ['required','email:rfc,dns'],
            'message' => ['required','string'],
        ]);
    

        Message::create([
            'name' => request('name'),
            'email' => request('email'),
            'message' => request('message'),
        ]);

        $request->session()->flash('success', 'Message Send');
        return redirect()->back();
        
    }

    public function index()
    {
        $messages = Message::all();
    
        return view('admin/messages/index', compact('messages'));
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect('/admin/messages');
    }
}
