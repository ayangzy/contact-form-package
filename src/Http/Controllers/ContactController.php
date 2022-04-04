<?php

namespace Ayangzy\Contact\Http\Controllers;

use Illuminate\Http\Request;
use Ayangzy\Contact\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Ayangzy\Contact\Mail\ContactMailable;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact::contact');
    }


    public function send(Request $request)
    {

        if (Contact::where('email', $request->email)->exists()) {
            return back()->withError('Contact with this email already exist!');
        }

        Contact::create($request->all());
        Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->message, $request->name));
        return back()->withSuccess('Thank you for contacting us, we will reach out to you soon!');
    }
}
