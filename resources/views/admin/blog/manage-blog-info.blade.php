<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Online Baking Classes | manage blog</title>

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
   <h1 class="heading">our blog news</h1>
   <form action="" method="post" class="search-tutor">
   <input type="text" name="search_box" placeholder="search blog news..." required maxlength="100">
   <button type="submit" class="fas fa-search" name="search_tutor"></button>
</form>
   <div class="box-container">
   <div class="box offer">
      <h3>add new blog news</h3>
      <p>Minat Cake Zone Academy is a baking school knowledge market place for bakers and beginners in baking. We provide a platform for experienced bakers to perfect their skills, learn different techniques, recipes "secret flavour & tips" through advanced baking</p>
      <a href="{{url('admin/blog/add-blog-info')}}" class="inline-btn">add new blog</a>
   </div>
   @forelse($blogs as $key=>$blog)
         <div class="box">
         <div class="thumb">
            <img src="blogimage/{{$blog->image}}" alt="" style="width:250px;">
         </div>
         <h3 class="title">{{$blog->title}}</h3>
         <p style="font-size:18px;">{{$blog->content}}</p>
         <p>{{$blog->created_at}}</p>
         <a href = "{{url('admin/edit-blog-info',$blog->id)}}"><i class="fas fa-pencil" style="color:darkblue !important; font-size:20px;"></i></a>
         <a href = "{{url('admin/delete-blog',$blog->id)}}" onclick="return confirm('Are you sure you want to delete?')"><i class="fas fa-trash" style="color:red !important; font-size:20px;"></i></a>
      </div>
      @empty
      <div class="box offer">
            <p>No blog news available</p>
            </div>
	@endforelse
   </div>
  
</section>




</div>

</section>
<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>