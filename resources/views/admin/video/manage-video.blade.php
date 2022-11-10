<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Online Baking Classes | Playlist</title>

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

<section class="watch-video">

   <h1 class="heading">playlist videos</h1>
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

   @forelse($videos as $key=>$video)
   <div class="video-container">
   <div class="video">
         <video  src="upload/{{$video->video_file}}" controls poster="coursecategoryimage/{{$video->course->courseCategory->image}}" id="video" style="width:290px; height:290px;"></video>
         <h3>course category:{{$video->course->courseCategory->name}}</h3>
         <p style="font-size:15px;">course name: {{$video->course->name}}</p>
         <a href="{{url('admin/video/edit-video',$video->id)}}" class="inline-btn"><i class="fas fa-pencil" style="color:#ffffff !important;"></i> Edit</a>
         <a href="{{url('admin/delete-video',$video->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="inline-btn"><i class="fas fa-trash" style="color:red !important;"></i> Delete</a>
      </div>
    </div>
      @empty
			<p>No video available for now</p>
	@endforelse
   </div>

</section>

<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>