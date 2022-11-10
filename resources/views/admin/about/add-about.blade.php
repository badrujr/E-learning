<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Online Baking Classes | About us</title>

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

   <form action="{{url('upload_about_us')}}" method="post" enctype="multipart/form-data">
   @csrf
      <h3>Add about us details</h3>
      <p>Title <span>*</span></p>
      <input type="text" name="title" placeholder="eg:Title" required maxlength="50" class="box">
      <p>Description <span>*</span></p>
      <textarea id="w3review" name="description" rows="4" cols="50" class="box"></textarea>
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