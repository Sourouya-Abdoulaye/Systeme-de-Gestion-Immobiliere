<?php

namespace App\Http\Controllers;

use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ProposController extends Controller
{
    //
    

    public function contact()
    {

        return view('contacte');
    }


    public function sendMessage(Request $request)
    {

        $donner = $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:1000'],
            'honeypot' => ['nullable', 'string', 'max:255']
        ]);

        // dd($donner);

        //email de destination
        Mail::to('sourouya@gmail.local')->send(new ContactMessage([
            'name' => $donner['name'],
            'email' => $donner['email'],
            'subject' => $donner['subject'],
            'message' => $donner['message']     
        ]));

        return back()->with('success', 'Votre message a été envoyé avec succès !');        
    }
}
