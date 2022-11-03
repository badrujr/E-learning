<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tutor Profile</title>

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

   <form action="{{url('upload_tutor_profile')}}" method="post" enctype="multipart/form-data">
   @csrf
      <h3>Add Tutor's Biography</h3>
      <p>Tutor name <span>*</span></p>
      <select name="tutor_id" class="box" required>
         <option value="">-- select tutor</option>
         @foreach($tutors as $tutor)
         <option value="{{$tutor->id}}">{{$tutor->name}}</option>
         @endforeach
      </select>
      <p>Biography <span>*</span></p>
      <textarea id="w3review" name="biography" rows="4" cols="50" class="box"></textarea>
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