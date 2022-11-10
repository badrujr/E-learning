<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Online Baking Classes | Bookmark</title>

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



<section class="watch-video">
<h1 class="heading">Your Bookmark video courses</h1>
@forelse($bookmarks as $key=>$bookmark)
<div class="video-container">
      <div class="video">
         <video src="upload/{{$bookmark->courseVideo->video_file}}" controls poster="coursecategoryimage/{{$bookmark->courseVideo->course->courseCategory->image}}" id="video"></video>
      </div>
      <h3 class="title">course: {{$bookmark->courseVideo->course->name}}</h3>
      <div class="info">
         <p class="date"><i class="fas fa-calendar"></i><span>{{$bookmark->courseVideo->course->created_at}}</span></p>
         <p class="date"><i class="fas fa-heart"></i><span>0 likes</span></p>
      </div>
      <div class="tutor">
         <img src="tutorimage/{{$bookmark->courseVideo->course->tutor->image}}" alt="">
         <div>
            <h3>course category: {{$bookmark->courseVideo->course->courseCategory->name}}</h3>
            <span>Tutor: {{$bookmark->courseVideo->course->tutor->name}}</span>
        
         </div>
      </div>
      <form action="{{url('add_like')}}" enctype="multipart/form-data" method="post" class="flex">
         @csrf
         <a href="{{url('student/quiz/attempt-quiz',$bookmark->courseVideo->id)}}" class="inline-btn">Attempt quiz</a>
         <input type="hidden" value="{{$bookmark->courseVideo->course->id}}"  class="inline-btn" name="course_id">
         <input type="hidden" value="{{Auth::user()->student->id}}" class="inline-btn" name="student_id">
         <input type="hidden" value="{{$bookmark->courseVideo->course->tutor->id}}" class="inline-btn" name="tutor_id">
         <button type="submit"><i class="far fa-heart"></i><span>like</span></button>
      </form>
      <p class="description">
        {{$bookmark->courseVideo->course->content}}
      </p>
   </div>
@empty
<div class="box container">
		<p style="color:red; font-size:20px;">No bookmark video available</p>
      </div>
@endforelse


</section>
<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>