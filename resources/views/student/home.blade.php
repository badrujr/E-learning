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

<section class="home-grid">

   <h1 class="heading">quick options</h1>

   <div class="box-container">

      <div class="box">
         <h3 class="title">likes and comments</h3>
         <p class="likes">total likes : <span>0</span></p>
         <a href="#" class="inline-btn">view likes</a>
        
         <a href="#" class="inline-btn">view comments</a>
         
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





<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>