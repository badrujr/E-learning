<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\Cart;
use App\Models\Student;
use Auth;
use Session;

class CartController extends Controller
{
    public function cart(){
        $carts = Cart::where('student_id','=',Auth::user()->id)->get();
        $sum = Cart::sum('price');
        return view('student.cart/cart',compact('carts','sum'));
    }
    static function cartItem(){
        $userId = Auth::user()->id;
        return Cart::where('student_id',$userId)->count();
    }

    public function saveCart(request $request){
        $cart = new Cart;

        $cart->student_id=$request->student_id;

        $cart->course_id=$request->course_id;

        $cart->price=$request->price;

        $cart->status="Processing";

        if(!$cart){
            return back()->with('message','cart details is not available'); 
        }
        try{
            
          $cart->save();
          return back()->with('message','cart added succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','This information is already saved into the database. you can not add twice'); 

        }
    
    }

    public function deleteCartItem($id){
        $deleteCartItem = Cart::find($id);
        $deleteCartItem->delete();
        return back()->with('message','cart removed succesfully'); 
    }
}
