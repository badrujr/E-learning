<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tutor</title>

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

<section class="teachers">

   <h1 class="heading">expert tutors</h1>

   <form action="" method="post" class="search-tutor">
      <input type="text" name="search_box" placeholder="search tutors..." required maxlength="100">
      <button type="submit" class="fas fa-search" name="search_tutor"></button>
   </form>

   <div class="box-container">
      @foreach($tutors as $tutor)
      <div class="box">
         <div class="tutor">
            <img src="tutorimage/{{$tutor->image}}" alt=""/>
            <div>
               <h3>{{$tutor->name}}</h3>
               <span>{{$tutor->profession->name}}</span>
            </div>
         </div>
         <p>Email: {{$tutor->email}}</p>
         <a href="{{url('student/tutor/profile',$tutor->id)}}" class="inline-btn">view profile</a>
      </div>
      @endforeach
   

   </div>

</section>


<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>