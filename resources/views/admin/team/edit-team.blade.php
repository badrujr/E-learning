<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Team</title>

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
<form action="{{url('editteam_form',$edit_team->id)}}"  method="post" enctype="multipart/form-data">
   @csrf
      <h3>Add your team member</h3>
      <p>old picture <span>*</span></p>
      <img src="teamimage/{{$edit_team->image}}" style="border-radius:50%;height:40px;">
      <p>Select picture <span>*</span></p>
      <input type="file" name="file" accept="image/*" class="box">
      <p>Title <span>*</span></p>
      <input type="text" value="{{$edit_team->title}}" name="title" placeholder="eg:Title" required maxlength="50" class="box">
      <p>Full name <span>*</span></p>
      <input type="text" value="{{$edit_team->name}}" name="name" placeholder="eg:Amina Khalid" required maxlength="50" class="box">
      <p>Instagram username <span>*</span></p>
      <input type="text" value="{{$edit_team->instagram_url}}" name="instagram_url" placeholder="eg:minahuncho" required maxlength="50" class="box">
      <p>Twitter username <span>*</span></p>
      <input type="text" value="{{$edit_team->twitter_url}}" name="twitter_url" placeholder="eg:Amina Khalid" required maxlength="50" class="box">
      <p>LinkedIn username <span>*</span></p>
      <input type="text" value="{{$edit_team->linkedin_url}}" name="linkedin_url" placeholder="eg:Amina Khalid" required maxlength="50" class="box">
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