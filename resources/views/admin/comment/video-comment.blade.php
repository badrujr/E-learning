<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Online Baking Classes | Video comment</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./assets/css/style.css">
   <base href="/public">
  @include('css')
</head>
<body>

@include('admin.header')

@include('admin.sidebar')
<section class="teachers">

   <h1 class="heading">Video course comments</h1>

   <form action="" method="post" class="search-tutor">
      <input type="text" name="search_box" placeholder="search comments..." required maxlength="100">
      <button type="submit" class="fas fa-search" name="search_comment"></button>
   </form>
   @if(session()->has('message'))
        <div class="alert alert-warning alert-has-icon" style="color:red; font-size:20px;">
        {{session()->get('message')}}
        </div>
        @else
        <div class="" style="color:red !important; font-size:20px;">
        {{session()->get('message')}}
        </div>
      @endif
   <div class="box-container">

      @forelse($comments as $key=>$comment)
      <div class="box">
         <div class="tutor">
            <img src="tutorimage/{{$comment->tutor->image}}" alt="">
            <div>
               <h3>Tutor name: {{$comment->tutor->name}}</h3>
               <span>Student name: {{$comment->student->name}}</span>
            </div>
         </div>
         <p>Comment: "{{$comment->comment}}"</p>
         <a href="{{url('admin/comment/edit-video-comment',$comment->id)}}" class="inline-btn">Edit</a>
         <a href="{{url('admin/delete-comment',$comment->id)}}" class="inline-btn">Delete</a>
      </div>
      @empty
      <p style="font-size:20px; color:red;">No comments available in any video course</p>
      @endforelse
   

   </div>

</section>
<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>