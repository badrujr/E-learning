<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Online Baking Classes | Add upload video</title>

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

   <form action="{{url('editvideo_form',$edit_video->id)}}" method="post" enctype="multipart/form-data">
   @csrf
      <h3>Edit video</h3>
      <p>old video <span>*</span></p>
      <video  src="upload/{{$edit_video->video_file}}" controls poster="coursecategoryimage/{{$edit_video->course->courseCategory->image}}" id="video" style="width:200px; height:200px;"></video>
      <p>course name <span>*</span></p>
      <select name="course_id" class="box" required value="{{$edit_video->course->name}}">
         <option value="{{$edit_video->course->id}}">{{$edit_video->course->name}}</option>
         @foreach($courses as $course)
         <option value="{{$course->id}}">{{$course->name}}</option>
         @endforeach
      </select>
      <p>select video <span>*</span></p>
      <input type="file" name="video" accept="image/*" required class="box">
      <p style="color:red;">
        @if($errors->has('video'))
        {{$errors->first('video')}}
        @endif
      </p>
      <input type="submit" value="upload" name="submit" class="btn">
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