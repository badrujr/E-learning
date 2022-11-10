<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Online Baking Classes | courses</title>

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
            <span>0 videos</span>
         </div>
         <h3 class="title">{{$course->courseCategory->name}}</h3>
         <a href="{{url('student/view_playlist',$course->id)}}" class="inline-btn">start now</a>
      </div>
         @empty
						     <p>No course available</p>
						@endforelse
     

   </div>

</section>


<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>