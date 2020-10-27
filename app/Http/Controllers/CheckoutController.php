<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Support\Str;
use Session;
use DB;

class CheckoutController extends Controller
{
    public function index() {

        $cart = Session::get('cart');
        return view('prompt.checkout.index', compact('cart'));
    }

    public function checkout(Request $request) {

        $cart = Session::get('cart');

     
    //    dd($request->all());
        $digits = 4;
        $length = 32;
        $randnum = rand(pow(10, $digits-1), pow(10, $digits)-1);
        $randstr = Str::random($length);
//        dd($randnum);
        DB::beginTransaction();
         $user = User::create([
             'role_id' => 1,
             'f_name' => $request->billing_first_name,
             'l_name' => $request->billing_last_name,
             'address' => $request->billing_address,
             'email' => $request->billing_email,
             'password' => null,

         ]);

         $order = Order::create([

             'customer_id' => $user->id, 
             'order_number' => 'PP-'.$randnum,
             'reference' => $randstr,
             'shipping_fname' => $request->billing_first_name,
             'shipping_lname' => $request->billing_last_name,
             'shipping_address' => $request->billing_address,
             'city' => $request->billing_city,
             'zipcode' => $request->billing_zip_code,
             'shipping_email' => $request->billing_email,
             'phone' => $request->billing_phone,
             'status' => 2,
             'total_qty' => $cart->getTotalQty(),
             'total_price' => $cart->getTotalPrice(),
             'shipping_fee' => null


         ]);
         foreach ($cart->getContents() as $slug => $product) {
         $orderdetails = OrderDetail::create([


             'order_id' => $order->id,
             'quantity' => $product['qty'],
             'user_id' => $user->id,
             'product_id' => $product['product']->id,
             'unit_price' => $product['product']->price
            
         ]);
        }

        if($user && $order && $orderdetails) {
            $details = [
                'title' => 'Order Placed', 
                'body' => 'Your order number '.$order->order_number. ' has been successfully placed.',
                'from' => 'zeeshanh184@gmail.com',
    
            ];
            DB::commit();
            $request->session()->forget('cart');

            \Mail::to(str_replace('', '', $request->billing_email))->send(new \App\Mail\CheckoutMail($details));
            Session::flash('success', 'Order has been placed successfully!');
            return back();
        }
        else {
            DB::rollback();

            Session::flash('error', 'Order not placed!');
            return back();
        }
        
    }
}
