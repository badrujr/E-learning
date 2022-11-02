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

<header class="header">
   
   <section class="flex">

      <a href="{{url('/home')}}" class="logo">Minat Bakery Academy.</a>

      <form action="search.html" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
        
      </div>

      <div class="profile">
         <img src="./assets/images/admin.jpeg" class="image" alt="">
         
         <h3 class="name">{{Auth::user()->name}}</h3>
         <p class="role">{{Auth::user()->role}}</p>
         @if(Route::has('login'))

@auth
<div class="flex-btn">
            <a href="{{url('student/profile')}}" class="option-btn">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();" class="option-btn">Logout</a>
                   
                </form>
            
         </div>

@else
<div class="flex-btn">
            <a href="login.html" class="option-btn">login</a>
            <a href="register.html" class="option-btn">register</a>
         </div>
@endauth

@endif
         
        
      </div>

   </section>

</header>   

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