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

<h1 class="heading">Students Recycle Bin</h1>

<form action="{{url('search_student')}}" method="post" enctype="multipart/form-data"  class="search-tutor">
   @csrf
   <input type="text" name="search_student" placeholder="search student..." required maxlength="100">
   <button type="submit" class="fas fa-search"></button>
</form>
@if(session()->has('message'))
        <div class="alert alert-success alert-has-icon" style="color:green; font-size:20px;">
        {{session()->get('message')}}
        </div>
        @else
        <div class="" style="color:red !important; font-size:20px;">
        {{session()->get('message')}}
        </div>
      @endif
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
      <a href="{{url('admin/restore-student',$student->id)}}" class="inline-btn"><i class="fas fa-refresh" style="color:#ffffff !important;"></i> Restore</a>
      <a href="{{url('admin/permanent-delete-student',$student->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="inline-btn"><i class="fas fa-trash" style="color:red !important;"></i> Delete</a>
   </div>
   @empty
			<div class="box offer">
            <p>Your trash is empty</p>
            </div>
            
	@endforelse


</div>

</section>
<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>