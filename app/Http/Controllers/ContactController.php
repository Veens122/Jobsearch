<?php

namespace App\Http\Controllers;

use App\Mail\RequestFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function submit(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'subject' => 'required|string',
                'phone' => 'nullable|string',
                'message' => 'required|string',
            ]
        );

        Mail::to('veenstechsolutions@gmail.com')->send(new RequestFormMail($data));

        return back()->with('success', 'Your request has been submitted successfully');
    }
}
