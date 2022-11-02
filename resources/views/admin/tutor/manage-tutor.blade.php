<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tutor</title>

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
         <img src="./assets/images/pic-1.jpg" class="image" alt="">
         
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
<section class="teachers">

   <h1 class="heading">expert tutors</h1>

   <form action="" method="post" class="search-tutor">
      <input type="text" name="search_box" placeholder="search tutors..." required maxlength="100">
      <button type="submit" class="fas fa-search" name="search_tutor"></button>
   </form>
  
   <div class="box-container">
   <div class="box offer">
         <h3><i class="fas fa-chalkboard-user"></i> add new tutor</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, itaque ipsam fuga ex et aliquam.</p>
         <a href="{{url('admin/tutor/add-tutor')}}" class="inline-btn">add new tutor</a>
      </div>
      @foreach($tutorProfiles as $tutorProfile)
      <div class="box">
         <div class="tutor">
            <img src="tutorimage/{{$tutorProfile->tutor->image}}" alt="">
            <div>
               <h3>Name: {{$tutorProfile->tutor->name}}</h3>
               <span>Profession: {{$tutorProfile->tutor->profession->name}}</span>
            </div>
         </div>
         <p>{{$tutorProfile->biography}}</p>
         <p>Email: {{$tutorProfile->tutor->email}}</p>
         <a href="{{url('admin/tutor/edit-tutor',$tutorProfile->id)}}" class="inline-btn">Edit</a>
         <a href="{{url('admin/tutor/delete',$tutorProfile->id)}}" class="inline-btn">Delete</a>
      </div>
      @endforeach
   

   </div>

</section>
<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>