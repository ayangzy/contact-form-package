<?php

namespace Ayangzy\Contact\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ayangzy\Contact\Mail\ContactMailable;
use Ayangzy\Contact\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact::contact');
    }


    public function send(Request $request)
    {
        Contact::create($request->all());
        Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->message, $request->name));
        return redirect(route('index'));
    }
}
