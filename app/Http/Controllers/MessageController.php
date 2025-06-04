<?php

namespace App\Http\Controllers;

use App\Mail\CandidateMessageMail;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    //

    public function messages()
    {
        $user = auth()->user();
        $layout = $this->getLayoutByRole($user->role_id);

        $messages = Message::where('receiver_id', $user->id)->latest()->get();

        return view('messages', compact('messages', 'layout'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'subject' => 'nullable|string|max:255',
            'body' => 'required|string',
        ]);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'subject' => $request->subject,
            'body' => $request->body,
        ]);

        $candidate = User::findOrFail($request->receiver_id);

        // If Employer (2) sends to Candidate (3), send email
        if (auth()->user()->role_id == 2 && $candidate->role_id == 3) {
            Mail::to($candidate->email)->send(
                new CandidateMessageMail($request->subject, $request->body)
            );
        }

        return redirect()->back()->with('success', 'Message sent successfully.');
    }

    public function inbox()
    {
        $user = auth()->user();
        $layout = $this->getLayoutByRole($user->role_id);

        $messages = Message::where('receiver_id', $user->id)->latest()->get();

        return view('messages', compact('layout', 'messages'));
    }

    private function getLayoutByRole($roleId)
    {
        return match ($roleId) {
            1 => 'layouts.super_admin_app',
            2 => 'layouts.employer_app',
            3 => 'layouts.candidate_app',
            default => 'layouts.app',
        };
    }
}
