<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Testimonial</title>

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

<section class="reviews">

   <h1 class="heading">student's reviews</h1>
   @if(session()->has('message'))
        <div class="alert alert-success alert-has-icon" style="color:green; font-size:20px;">
            {{session()->get('message')}}
        </div>
      @endif
   <div class="box-container">
   @forelse($testimonials as $testimonial)
      <div class="box">
         <p>"{{$testimonial->content}}"</p>
         <div class="student">
            <img src="studentimage/{{$testimonial->student->image}}" alt="">
            <div>
               <h3>{{$testimonial->student->name}}</h3>
                @if($testimonial->publish == 0)
                <p>Disabled</p>
                @else
                <p>Enabled</p>
                @endif
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <a href="{{url('admin/approve-testimonial',$testimonial->id)}}" class="inline-btn"><i class="fas fa-pencil" style="color:#ffffff !important;"></i> Edit</a>
               <a href="{{url('admin/delete-testimonial',$testimonial->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="inline-btn"><i class="fas fa-trash" style="color:red !important;"></i> Delete</a>
            </div>
         </div>
      </div>
      @empty
			<div class="box offer">
            <p>No testimonial available</p>
            </div>
            
	@endforelse
   </div>

</section>
<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>