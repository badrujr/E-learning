<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

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

<section class="dashboard">

   <h1 class="heading">dashboard, Hi! {{Auth::user()->name}}</h1>

   <div class="box-container">
   <div class="box">
         <h3>{{$student}}</h3>
         <p>Students</p>
         <a href="{{url('admin/student/add-student')}}" class="btn">add new student</a>
         <a href="{{url('admin/student/manage-student')}}" class="btn">view student</a>
      </div>
      <div class="box">
         <h3>{{$country}}</h3>
         <p>total countries</p>
         <a href="{{url('admin/country/add-country')}}" class="btn">add new country</a>
         <a href="{{url('admin/country/manage-country')}}" class="btn">view country</a>
      </div>
      <div class="box">
         <h3>{{$level}}</h3>
         <p>total levels</p>
         <a href="{{url('admin/level/add-level')}}" class="btn">add new level</a>
         <a href="{{url('admin/level/manage-level')}}" class="btn">view level</a>
      </div>

      <div class="box">
         <h3>{{$categories}}</h3>
         <p>course category</p>
         <a href="{{url('admin/category/add-category')}}" class="btn">add new category</a>
         <a href="{{url('admin/category/manage-category')}}" class="btn">view category</a>
      </div>
      <div class="box">
         <h3>{{$profession}}</h3>
         <p>professionals</p>
         <a href="{{url('admin/profession/add-profession')}}" class="btn">add new profession</a>
         <a href="{{url('admin/profession/manage-profession')}}" class="btn">view profession</a>
      </div>

      <div class="box">
         <h3>{{$tutor}}</h3>
         <p>Tutor</p>
         <a href="{{url('admin/tutor/add-tutor')}}" class="btn">add new tutor</a>
         <a href="{{url('admin/tutor/manage-tutor')}}" class="btn">manage tutor</a>
      </div>
      <div class="box">
         <p>tutor's Biography</p>
         <a href="{{url('admin/tutorProfile/add-tutor-profile')}}" class="btn">add tutor biography</a>
         <a href="{{url('admin/tutorProfile/manage-tutor-profile')}}" class="btn">manage tutor biography</a>
      </div>

      <div class="box">
         <h3>{{$count}}</h3>
         <p>total course</p>
         <a href="{{url('admin/course/add-course')}}" class="btn">add new lessons / course</a>
         <a href="{{url('admin/course/manage-course')}}" class="btn">view lessons / course</a>
      </div>
      <div class="box">
         <h3>0</h3>
         <p>total playlist / videos</p>
         <a href="{{url('admin/video/add-video')}}" class="btn">add new video</a>
         <a href="{{url('admin/video/manage-video')}}" class="btn">view video</a>
      </div>

      <div class="box">
         <h3>{{$student}}</h3>
         <p>total admissions</p>
         <a href="" class="btn">view admissions</a>
      </div>
      <div class="box">
         <h3>{{$quiz}}</h3>
         <p>total quizes</p>
         <a href="{{url('admin/quiz/add-quiz')}}" class="btn">add new quiz</a>
         <a href="" class="btn">view quiz</a>
      </div>
      <div class="box">
         <h3>0</h3>
         <p>total bookmark</p>
         <a href="add_content.php" class="btn">view bookmarks</a>
      </div>
      <div class="box">
         <h3>0</h3>
         <p>total comments</p>
         <a href="comments.php" class="btn">view comments</a>
      </div>

   </div>

</section>



<section class="courses">
   <h1 class="heading">our courses</h1>
   <div class="box-container">
   @forelse($courses as $key=>$course)
         <div class="box">
         <div class="tutor">
            <img src="tutorimage/{{$course->tutor->image}}" alt="">
            <div class="info">
               <h3>{{$course->tutor->name}}</h3>
               
               <span>{{$course->created_at}}</span>
            </div>
         </div>
         <div class="thumb">
            <img src="coursecategoryimage/{{$course->courseCategory->image}}" alt="">
            <span>{{$count}} videos</span>
         </div>
         <h3 class="title">{{$course->courseCategory->name}}</h3>
         <p style="font-size:18px;">ksh {{$course->price}}/=</p>
         <a href="{{url('admin/video/playlist',$course->id)}}" class="inline-btn">view playlist</a>
      </div>
      @empty
			<p>No course available</p>
	@endforelse
   </div>
   <div class="more-btn">
      <a href="{{url('admin/showcourses')}}" class="inline-option-btn">view all courses</a>
   </div>
</section>

<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>