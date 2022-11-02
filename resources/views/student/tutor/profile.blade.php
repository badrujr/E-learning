<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>tutor profile</title>

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

<section class="about">

   <div class="row">

      <div class="image">
         <img src="tutorimage/{{$tutor->image}}" alt="" style="width:400px; height:600px;"/>
      </div>

      <div class="content">
         <h3>{{$tutor->name}}</h3>
         @forelse($tutor->tutorProfile as $key=>$tutorProfile)
         <p>{{$tutorProfile->biography}}</p>
         @empty
						     <p>No member's profile available</p>
						@endforelse
         <a href="courses.html" class="inline-btn">my courses</a>
      </div>

   </div>

   <div class="box-container">

      <div class="box">
         <i class="fas fa-heart"></i>
         <div>
            <h3>+10k</h3>
            <p>total likes</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div>
            <h3>+40k</h3>
            <p>total comments</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div>
            <h3>+2k</h3>
            <p>total videos</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-briefcase"></i>
         <div>
            <h3>100%</h3>
            <p>total playlist</p>
         </div>
      </div>

   </div>

</section> 

<section class="courses">

   <h1 class="heading">My courses</h1>

   <div class="box-container">
   @forelse($tutor->courses as $key=>$courses)
      <div class="box">
         <div class="thumb">
            <img src="coursecategoryimage/{{$courses->courseCategory->image}}" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">{{$courses->name}}</h3>
         <a href="{{url('student/video/watch-video',$courses->courseVideos)}}" class="inline-btn">watch video</a>
      </div>
      @empty
						     <p style="font-size:20px; color:red;">No videos available</p>
						@endforelse

   </div>

</section>

<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>