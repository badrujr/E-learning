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

@include('student.header') 

@include('student.sidebar')

<section class="home-grid">

   <h1 class="heading">quick options</h1>

   <div class="box-container">

      <div class="box">
         <h3 class="title">likes and comments</h3>
         <p class="likes">total likes : <span>25</span></p>
         <a href="#" class="inline-btn">view likes</a>
         <p class="likes">total comments : <span>{{$count_comment}}</span></p>
         <a href="#" class="inline-btn">view comments</a>
         <p class="likes">saved playlists : <span>4</span></p>
         <a href="#" class="inline-btn">view playlists</a>
      </div>

      <div class="box">
         <h3 class="title">top categories</h3>
         @forelse($categories as $key=>$category)
         <div class="flex">
            <a href="#"><i class="fas fa-cake"></i><span>{{$category->name}}</span></a>
         </div>
         @empty
         <div class="box container">
         <p style="font-size:15px; color:red;">No course categories  available</p>
         </div>
			
			@endforelse
      </div>

      <div class="box">
         <h3 class="title">popular levels</h3>
         @forelse($levels as $key=>$level)
         <div class="flex">
            <a href="#"><i class="fab fa-graduation-cap"></i><span>{{$level->name}}</span></a>
         </div>
         @empty
         <div class="box container">
         <p style="font-size:15px; color:red;">No levels  available</p>
         </div>
         @endforelse
      </div>

      <div class="box">
         <h3 class="title">Student</h3>
         <p class="tutor">Minat Bakery Academy have reached more than {{$students}}k+ students in Mombasa - Kenya</p>
         <a href="{{url('student/showcourses')}}" class="inline-btn">get started</a>
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
         <p style="font-size:18px;">ksh {{number_format($course->price)}}/=</p>
         <form action="{{url('upload_cart')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{Auth::user()->student->id}}" name="student_id"/>
            <input type="hidden" value="{{$course->id}}" name="course_id"/>
            <input type="hidden" value="{{$course->price}}" name="price"/>
            <input type="submit" value="Add to cart" name="submit" class="inline-btn">
         </form>
         <a href="{{url('student/video/playlist',$course->id)}}" class="inline-btn">view playlist</a>
      </div>
      @empty
      <div class="box container">
		<p style="color:red; font-size:20px;">No course available</p>
      </div>
	
	@endforelse
   </div>
   <div class="more-btn">
      <a href="{{url('student/showcourses')}}" class="inline-option-btn">view all courses</a>
   </div>
</section>


<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>