<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Online Baking Classes | Home</title>

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
         <p style="font-size:18px;">USD {{number_format($course->price)}}/=</p>
         @if(is_null($payment))
         <form action="{{url('upload_cart')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{Auth::user()->student->id}}" name="student_id"/>            
            <input type="hidden" value="{{$course->id}}" name="course_id"/>
            <input type="hidden" value="{{$course->price}}" name="price"/>
            <input type="submit" value="Add to cart" name="submit" class="inline-btn">
         </form>
        @elseif($payment == '')
        <form action="{{url('upload_cart')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{Auth::user()->student->id}}" name="student_id"/>            
            <input type="hidden" value="{{$course->id}}" name="course_id"/>
            <input type="hidden" value="{{$course->price}}" name="price"/>
            <input type="submit" value="Add to cart" name="submit" class="inline-btn">
         </form>
         @else
         <a href="{{url('student/video/playlist',$course->id)}}" class="inline-btn">view playlist</a>
         @endif
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