<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit tutor</title>

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
<form action="{{url('edittutor_form',$edit_tutor->id)}}"  method="post" enctype="multipart/form-data">
   @csrf
      <h3>Edit tutor</h3>
      <p>old picture <span>*</span></p>
      <img src="tutorimage/{{$edit_tutor->image}}" style="border-radius:50%;height:40px;">
      <p>Select picture <span>*</span></p>
      <input type="file" name="file" accept="image/*" class="box">
      <p>Profession <span>*</span></p>
      <select name="profession_id" class="box" required value="{{$edit_tutor->profession->name}}">
         <option value="{{$edit_tutor->profession->id}}">{{$edit_tutor->profession->name}}</option>
         @foreach($professions as $profession)
         <option value="{{$profession->id}}">{{$profession->name}}</option>
         @endforeach
      </select>
      <p>name <span>*</span></p>
      <input type="text" name="name" value="{{$edit_tutor->name}}" placeholder="eg:masterclass cake" required maxlength="50" class="box">
      <p>Description <span>*</span></p>
      <textarea id="w3review" name="description" value="{{$edit_tutor->description}}" rows="4" cols="50" class="box"></textarea>
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