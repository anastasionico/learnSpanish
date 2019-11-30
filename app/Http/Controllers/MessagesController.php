<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required','string'],
            'email' => ['required'],
            'message' => ['required','string'],
        ]);
    

        Message::create([
            'name' => request('name'),
            'email' => request('email'),
            'message' => request('message'),
        ]);

        $this->sendEmail(request('name'), request('email'), request('message'));

        $request->session()->flash('success', 'Message Sent');
        return redirect()->back();
        
    }

    public function sendEmail($contactName, $contactEmail, $contactMessage)
    {
        Mail::raw($contactMessage, function ($mail) use($contactName, $contactEmail) {
            $mail->to(env('MAIL_USERNAME'))
            ->subject("Message from $contactName, ($contactEmail) on Espapaya.com");
        });
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
