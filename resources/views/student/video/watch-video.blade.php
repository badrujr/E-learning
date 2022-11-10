<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Online Baking Classes | watch course</title>

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

   <div class="video-container">
      <div class="video">
         <video src="upload/{{$courseVideo->video_file}}" controls poster="coursecategoryimage/{{$courseVideo->course->courseCategory->image}}" id="video"></video>
      </div>
      <h3 class="title">course: {{$courseVideo->course->name}}</h3>
      <div class="info">
         <p class="date"><i class="fas fa-calendar"></i><span>{{$courseVideo->course->created_at}}</span></p>
         <p class="date"><i class="fas fa-heart"></i><span>0 likes</span></p>
         <form action="{{url('add_bookmark')}}" method="post" enctype="multipart/form-data" class="flex">
      @csrf
      <input type="hidden" value="{{Auth::user()->student->id}}" name="student_id"/>            
      <input type="hidden" value="{{$courseVideo->id}}" name="course_video_id"/>
      <button type="submit"><i class="far fa-bookmark"></i> <span>save playlist</span></button>
      </form>
      </div>
      <div class="tutor">
         <img src="tutorimage/{{$courseVideo->course->tutor->image}}" alt="">
         <div>
            <h3>course category: {{$courseVideo->course->courseCategory->name}}</h3>
            <span>Tutor: {{$courseVideo->course->tutor->name}}</span>
        
         </div>
      </div>
      <form action="{{url('add_like')}}" enctype="multipart/form-data" method="post" class="flex">
         @csrf
         <a href="{{url('student/quiz/attempt-quiz',$courseVideo->id)}}" class="inline-btn">Attempt quiz</a>
         <input type="hidden" value="{{$courseVideo->course->id}}"  class="inline-btn" name="course_id">
         <input type="hidden" value="{{Auth::user()->student->id}}" class="inline-btn" name="student_id">
         <input type="hidden" value="{{$courseVideo->course->tutor->id}}" class="inline-btn" name="tutor_id">
         <button type="submit"><i class="far fa-heart"></i><span>like</span></button>
      </form>
    
      <p class="description">
        {{$courseVideo->course->content}}
      </p>
   </div>

</section>

<section class="comments">

   <h1 class="heading">0 comments</h1>

   <form action="{{url('upload_comment')}}" method="post" enctype="multipart/form-data" class="add-comment">
      @csrf
      <h3>add comments</h3>
      <input type="hidden" value="{{$courseVideo->id}}"  class="inline-btn" name="course_video_id">
      <input type="hidden" value="{{Auth::user()->student->id}}" class="inline-btn" name="student_id">
      <input type="hidden" value="{{$courseVideo->course->tutor->id}}" class="inline-btn" name="tutor_id">
      <textarea name="comment" placeholder="enter your comment" required maxlength="1000" cols="30" rows="10"></textarea>
      <input type="submit" value="add comment" class="inline-btn" name="add_comment">
      @if(session()->has('message'))
        <div class="alert alert-success alert-has-icon" style="color:green; font-size:20px;">
        {{session()->get('message')}}
        </div>
        @else
        <div class="" style="color:red !important; font-size:20px;">
        {{session()->get('message')}}
        </div>
      @endif
   </form>

   <h1 class="heading">student's comments</h1>
   <div class="box-container">
   @forelse($courseVideo->comments as $key=>$comment)
      <div class="box">
         <div class="user">
            <img src="studentimage/{{$comment->student->image}}" alt="">
            <div>
               <h3>{{$comment->student->name}}</h3>
               <span>{{$comment->created_at}}</span>
            </div>
         </div>
         <div class="comment-box">{{$comment->comment}}</div>
      </div>
      @empty
			<p style="font-size:15px; color:red;">No comment available for this course!</p>
	@endforelse
   
   </div>

</section>

<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>
   
</body>
</html>