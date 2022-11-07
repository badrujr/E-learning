<?php
use App\Http\Controllers\CartController;
$total = CartController::cartItem();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./assets/css/style.css">
   <base href="/public">
  @include('css')

  <style>

.container{
    margin: 2% 10%;
    /* border: 1px solid #f3f0ff; */
    text-align: center;
    border-radius: 7px;
    background-color:#ffffff;

    
}

.cart-heading {
    text-align: left;
    padding-left: 30px;
}

.cart-heading h3{
    padding: 10px 0;
}

.cart{
    border: 1px solid #f3f0ff;
    width:100%;
}

.cart-body{
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding: 10px 0;
    /* border-radius:5px; */
}

.cart-image img{
    width: 150px;
    height:150px;
    border-radius: 5px;
    padding-right: 50px 50px;
}

.cart-details{
    padding: 10px 10px;
}

.course a{
    text-decoration: none;
    color: #ffffff;
    background-color: #f03e3e;
    padding: 5px 20px;
}
.course p{
    color: #000000;
    font-size:15px;
    /* padding: 5px 20px; */
}

.subtitle{
    padding: 40px 0;
    text-align: left;
}

.title, .course{
    display: flex;
    justify-content: space-between;
}

.cart-amount{
    display: flex;
    justify-content: space-between;
    padding: 20px 30px;
    font-size:15px;
}

.checkout{
    text-align: center;
    padding: 20px 0;
    
}

.checkout a{
    text-decoration: none;
    background-color: darkblue;
    color: #ffffff;
    padding: 10px 20px;
    font-size:20px;
}

@media screen and (max-width: 900px){

.cart{

    flex-direction: column;

}

.cart-total{

    margin-left: 0;

    margin-bottom: 20px;

}

}

@media screen and (max-width: 1220px){

.container{

    max-width: 95%;

}

}

  </style>
</head>
<body>

@include('student.header') 

@include('student.sidebar')

<section class="teachers">

   <h1 class="heading">Your cart ({{$total}})</h1>
   <div class="container">
      <div class="cart cart-heading">
        <h3>Your cart</h3>
      </div>
    @forelse($carts as $key=>$cart)
      <div class="cart cart-body">
        <div class="cart-image">
          <img src="coursecategoryimage/{{$cart->course->courseCategory->image}}" alt="" />
        </div>
        <div class="cart-details">
          <div class="course">
            <p>category: {{$cart->course->courseCategory->name}}</p>
            <p>Ksh {{number_format($cart->price)}}</p>
          </div>
          <p class="subtitle"></p>
          <div class="course">
            <p>course: {{$cart->course->name}}</p>
            <a href = "{{url('student/delete-cart',$cart->id)}}" onclick="return confirm('Are you sure you want to delete?')"><i class="fas fa-trash" style="color:#ffffff !important; font-size:20px;"></i></a>
          </div>
        </div>
      </div>
      <div class="cart cart-footer">
        <div class="cart-amount">
          <p>Subtotal</p>
          <p>KES<span>{{number_format($sum)}}</span></p>
        </div>
        <div class="checkout">
          <a href="{{url('student/payment/payment',$cart->id)}}">Checkout</a>
        </div>
      </div>
      @empty
      <div class="box container">
      <p style="color:red !important; font-size:20px;">Your cart is empty</p>
      </div>
      
      @endforelse

     
    </div>

</section>


<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>