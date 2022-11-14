<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Online Baking Classes | Student</title>

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

<h1 class="heading">our students</h1>
<div class="box-container">
   @forelse($students as $key=>$student)
   <div class="box">
      <div class="tutor">
         <img src="studentimage/{{$student->image}}" alt="">
         <div>
            <h3>Name: {{$student->name}}</h3>
            <span>Username: {{$student->user->email}}</span>
         </div>
      </div>
      <p>Country: {{$student->country->name}}</p>
      <p>Age: {{\Carbon\Carbon::parse($student->dob)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days');}}</p>
      
      <p>Gender: {{$student->gender->name}}</p>
      <p>Created at: {{date('F j,Y', strtotime($student->created_at))}}</p>
    
   </div>
   @empty
			<div class="box offer">
            <p>No student available</p>
            </div>
            
	@endforelse


</div>

</section>
<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>