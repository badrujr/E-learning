<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit category</title>

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

<section class="form-container">
<form action="{{url('editcategory_form',$edit_category->id)}}"  method="post" enctype="multipart/form-data">
   @csrf
      <h3>Edit course category</h3>
      <p>old thumb picture <span>*</span></p>
      <img src="coursecategoryimage/{{$edit_category->image}}" style="border-radius:50%;height:40px;">
      <p>Select picture <span>*</span></p>
      <input type="file" name="file" accept="image/*" class="box">
      <p>Level <span>*</span></p>
      <select name="level_id" class="box" required value="{{$edit_category->level->name}}">
         <option value="{{$edit_category->level->id}}">{{$edit_category->level->name}}</option>
         @foreach($levels as $level)
         <option value="{{$level->id}}">{{$level->name}}</option>
         @endforeach
      </select>
      <p>course category name <span>*</span></p>
      <input type="text" name="name" value="{{$edit_category->name}}" placeholder="eg:masterclass cake" required maxlength="50" class="box">
      <p>Description <span>*</span></p>
      <textarea id="w3review" name="description" value="{{$edit_category->description}}" rows="4" cols="50" class="box"></textarea>
      <input type="submit" value="submit" name="submit" class="btn">
      @if(session()->has('message'))
        <div class="alert alert-success alert-has-icon" style="color:green; font-size:20px;">
            {{session()->get('message')}}
        </div>
      @endif
   </form>
 

</section>
<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>