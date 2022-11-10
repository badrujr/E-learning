<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Online Baking Classes | Tutor</title>

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

   <h1 class="heading">expert tutors</h1>

   <form action="" method="post" class="search-tutor">
      <input type="text" name="search_box" placeholder="search tutors..." required maxlength="100">
      <button type="submit" class="fas fa-search" name="search_tutor"></button>
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
   <div class="box offer">
         <h3><i class="fas fa-chalkboard-user"></i> add new tutor</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, itaque ipsam fuga ex et aliquam.</p>
         <a href="{{url('admin/tutor/add-tutor')}}" class="inline-btn">add new tutor</a>
      </div>
      @foreach($tutorProfiles as $tutorProfile)
      <div class="box">
         <div class="tutor">
            <img src="tutorimage/{{$tutorProfile->tutor->image}}" alt="">
            <div>
               <h3>Name: {{$tutorProfile->tutor->name}}</h3>
               <span>Profession: {{$tutorProfile->tutor->profession->name}}</span>
            </div>
         </div>
         <p>{{$tutorProfile->biography}}</p>
         <p>Email: {{$tutorProfile->tutor->email}}</p>
         <a href="{{url('admin/tutor/edit-tutor',$tutorProfile->id)}}" class="inline-btn">Edit</a>
         <a href="{{url('admin/delete-tutor',$tutorProfile->id)}}" class="inline-btn">Delete</a>
      </div>
      @endforeach
   

   </div>

</section>
<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>