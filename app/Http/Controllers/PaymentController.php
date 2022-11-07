<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Course;

class PaymentController extends Controller
{
    public function createPayment($id){
        $cart = Cart::find($id);
        return view('student.payment/payment',compact('cart'));
    }
}
