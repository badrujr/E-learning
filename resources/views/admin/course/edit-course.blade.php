<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Online Baking Classes | Edit tutor</title>

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

<section class="form-container">
<form action="{{url('editcourse_form',$edit_course->id)}}"  method="post" enctype="multipart/form-data">
   @csrf
      <h3>Edit course</h3>
      <p>course category <span>*</span></p>
      <select name="course_category_id" class="box" required value="{{$edit_course->courseCategory->name}}">
         <option value="{{$edit_course->courseCategory->id}}">{{$edit_course->courseCategory->name}}</option>
         @foreach($categories as $category)
         <option value="{{$category->id}}">{{$category->name}}</option>
         @endforeach
      </select>
      <p>course name <span>*</span></p>
      <input type="text" name="name" value="{{$edit_course->name}}" placeholder="eg:masterclass cake" required maxlength="50" class="box">
      <p>Description <span>*</span></p>
      <textarea id="w3review" name="content" value="{{$edit_course->content}}" rows="4" cols="50" class="box"></textarea>
      <p>course fee (KE) <span>*</span></p>
      <input type="text" name="price" value="{{$edit_course->price}}" required maxlength="50" class="box">
      <p>Tutor <span>*</span></p>
      <select name="tutor_id" class="box" required value="{{$edit_course->tutor->name}}">
         <option value="{{$edit_course->tutor->id}}">{{$edit_course->tutor->name}}</option>
         @foreach($tutors as $tutor)
         <option value="{{$tutor->id}}">{{$tutor->name}}</option>
         @endforeach
      </select>
      <input type="submit" value="submit" name="submit" class="btn">
      @if(session()->has('message'))
        <div class="alert alert-success alert-has-icon" style="color:green; font-size:20px;">
            {{session()->get('message')}}
        </div>
      @endif
   </form>
 

</section>
<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>