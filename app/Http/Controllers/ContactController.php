<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Session;

class ContactController extends Controller
{
    public function index() {

        $cart = Session::get('cart');

        return view('prompt.contact.index', compact('cart'));
    }

    public function sendemail(Request $request) {

   //     dd($request->all());
        $details = [
            'title' => 'Contact Acknowledgement', 
            'body' => 'Your message has been recorded.',
            'from' => 'zeeshanh184@gmail.com',

        ];

        $contact = Contact::create([

            'full_name' => $request->fullname,
            'email' => $request->email,
            'subject' => $request->subject,
            'msg' => $request->message
        ]);

        \Mail::to(str_replace('', '', $request->email))->send(new \App\Mail\ContactMail($details));


        Session::flash('success', 'Email has been successfully sent!');

        return back();
    }
}
