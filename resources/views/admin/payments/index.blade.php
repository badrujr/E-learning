<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Online Baking Classes | Student</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./assets/css/style.css">
   <base href="/public">
  @include('css')
</head>
<body>

@include('admin.header')

@include('admin.sidebar')

<section class="teachers">

<h1 class="heading">Payment Records: Total Amount USD: {{number_format($sum)}}</h1>

<form action="" method="post" enctype="multipart/form-data"  class="search-tutor">
   @csrf
   <input type="text" name="search_student" placeholder="search payment..." required maxlength="100">
   <button type="submit" class="fas fa-search"></button>
</form>
<div class="box-container">
   @forelse($payments as $key=>$payment)
   <div class="box">
      <div class="tutor">
         
         <div>
         <h3>student name: {{$payment->student->name}}</h3>
            <span>Payer ID: {{$payment->payer_id}}</span>
         </div>
      </div>
      <p>Payment ID: {{$payment->payment_id}}</p>
      <p>Amount: {{$payment->currency}} {{$payment->amount}}</p>
      <p>Status: {{$payment->payment_status}}</p>
      <p>Created at: {{date('F j,Y', strtotime($payment->created_at))}}</p>
   </div>
   @empty
			<div class="box offer">
            <p>No payment records available</p>
            </div>
            
	@endforelse


</div>

</section>
<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>