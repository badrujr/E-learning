<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Online Baking Classes | Course</title>

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

   <h1 class="heading">manage course</h1>

   <form action="" method="post" class="search-tutor">
      <input type="text" name="search_box" placeholder="search course..." required maxlength="100">
      <button type="submit" class="fas fa-search" name="search_course"></button>
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
  
      @forelse($courses as $course)
      <div class="box">
         <div class="tutor">
            <img src="tutorimage/{{$course->tutor->image}}" alt="">
            <div>
               <h3>Tutor Name: {{$course->tutor->name}}</h3>
               <span>Profession: {{$course->tutor->profession->name}}</span>
            </div>
         </div>
         <p>Level: {{$course->CourseCategory->level->name}}</p>
         <p>course category: {{$course->CourseCategory->name}}</p>
         <p>course name: {{$course->name}}</p>
         <p>Fee: KE {{number_format($course->price)}}</p>
         <p>Course description: {{$course->content}}</p>
         <a href="{{url('admin/course/edit-course',$course->id)}}" class="inline-btn"><i class="fas fa-pencil" style="color:#ffffff !important;"></i> Edit</a>
         <a href="{{url('admin/delete-course',$course->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="inline-btn"><i class="fas fa-trash" style="color:red !important;"></i> Delete</a>
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