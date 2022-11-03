<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admission</title>

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

<section class="form-container">
@if(Auth::user()->student == null)
<form action="{{url('upload_student')}}" method="post" enctype="multipart/form-data">
      @csrf
      <h3>fill the admission form</h3>
      <p>full name <span>*</span></p>
      <input type="text" name="name" value="{{Auth::user()->name}}" placeholder="enter your first name" required maxlength="50" class="box">
      <p>gender <span>*</span></p>
      <select name="gender_id" class="box" required>
         <option value="">-- select gender</option>
         @foreach($genders as $gender)
         <option value="{{$gender->id}}">{{$gender->name}}</option>
         @endforeach
         
      </select>
      <p>D.O.B <span>*</span></p>
      <input type="date" name="dob" placeholder="date of birth" required maxlength="20" class="box">
      <p>country <span>*</span></p>
      <select name="country_id" class="box" required>
         <option value="">-- select country</option>
         @foreach($countries as $country)
         <option value="{{$country->id}}">{{$country->name}}</option>
         @endforeach
      </select>
     
      <p>select profile <span>*</span></p>
      <input type="file" name="file" accept="image/*" required class="box">
      <input type="hidden" name="user_id" value="{{Auth::user()->id}}" required maxlength="50" class="box">
      <input type="submit" value="submit" name="submit" class="btn">
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
@else
<div class="box offer">
<p style="font-size:20px; color:red;">You Alread make an admission on our system.</p>
</div>

@endif

</section>
<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>