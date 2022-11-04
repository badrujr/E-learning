<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Playlist</title>

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

<section class="playlist-details">

   <h1 class="heading">playlist details</h1>

   <div class="row">
 
      <div class="column">
      <form action="{{url('upload_bookmark')}}" method="post" enctype="multipart/form-data" class="save-playlist">
            @csrf
            <input type="hidden" value="{{Auth::user()->student->id}}" name="student_id"/>            
            <input type="hidden" value="{{$course->id}}" name="course_video_id"/>
            <button type="submit"><i class="far fa-bookmark"></i> <span>save playlist</span></button>
         </form>
         <div class="thumb">
            <img src="coursecategoryimage/{{$course->courseCategory->image}}" alt="">
            <span>0 videos</span>
         </div>
      </div>
      <div class="column">
         <div class="tutor">
            <img src="tutorimage/{{$course->tutor->image}}" alt="">
            <div>
               <h3>{{$course->tutor->name}}</h3>
               <span>{{$course->created_at}}</span>
            </div>
         </div>
   
         <div class="details">
            <h3>category: {{$course->courseCategory->name}}</h3>
            <p>course: {{$course->name}}</p>
            <p>{{$course->content}}</p>
            <a href="teacher_profile.html" class="inline-btn">view profile</a>
         </div>
      </div>


   </div>

</section>

<section class="playlist-videos">

   <h1 class="heading">playlist videos</h1>

   <div class="box-container">

   @forelse($course->courseVideo as $key=>$courseVideos)
   
      <a class="box" href="{{url('student/video/watch-video',$courseVideos->id)}}">
         <i class="fas fa-play"></i>
         <img src="coursecategoryimage/{{$course->courseCategory->image}}" alt="">
         <h3>{{$course->courseCategory->name}}</h3>
      </a>
      @empty
			<p>No video available for now</p>
	@endforelse
   </div>

</section>

<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>