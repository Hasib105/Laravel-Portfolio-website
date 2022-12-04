<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactFormController extends Controller
{
    public function store(){
        $contact=request()->all();
        Mail::to('abc@mail.com')->send(new ContactFormMail($contact));

        return redirect()->route('home','/#contact')-with('success','Your message has been sent successfully');
    }
}
