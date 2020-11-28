<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Session;
use Aman\EmailVerifier\EmailChecker;


class ContactController extends Controller
{
    public function index() {

        $cart = Session::get('cart');

        $total = [];
        if(isset($cart) && $cart->getContents()) {
            foreach($cart->getContents() as $slug => $product) {
            $total[] = $product['price'] * $product['quantity']; 
            }
    
        }
        else {
    
            $total[] = 0;
        }

        return view('prompt.contact.index', compact('cart', 'total'));
    }

    public function sendemail(Request $request) {

        $checker = new EmailChecker();
        $details = [
            'title' => 'Contact Acknowledgement', 
            'body' => 'Your message has been recorded.',
            'from' => 'zeeshanh184@gmail.com',

        ];
   //     dd($request->all());


        $check = app(EmailChecker::class)->checkEmail(str_replace('', '', $request->email),'boolean');
        
//        dd($check);

        
       if($check['success'] == true) {


        $contact = Contact::create([

            'full_name' => $request->fullname,
            'email' => $request->email,
            'subject' => $request->subject,
            'msg' => $request->message
        ]);

        \Mail::to(str_replace('', '', $request->email))->send(new \App\Mail\ContactMail($details));

        Session::flash('success', 'Email has been successfully sent!');

       }
       else {

        Session::flash('error', 'Email does not exist in real world!');
       }
    
        return back();
    }
}
