<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Online Baking Classes | Profession</title>

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

<h1 class="heading">profession</h1>

<form action="" method="post" class="search-tutor">
   <input type="text" name="search_box" placeholder="search profession..." required maxlength="100">
   <button type="submit" class="fas fa-search" name="search_profession"></button>
</form>
@if(session()->has('message'))
                    <div class="alert alert-warning alert-has-icon" style="color:red; font-size:20px;">
                        
                        {{session()->get('message')}}
                    </div>
                  @endif
<div class="box-container">
   @forelse($professions as $key=>$profession)
   <div class="box">
      <div class="tutor">
         <div>
            <h3>Profession Name: {{$profession->name}}</h3>
         </div>
      </div>
      <p>created at: {{$profession->created_at}}</p>
      <p>updated at: {{$profession->updated_at}}</p>
      <a href="{{url('admin/profession/edit-profession',$profession->id)}}" class="inline-btn"><i class="fas fa-pencil" style="color:#ffffff !important;"></i> Edit</a>
      <a href="{{url('admin/delete-profession',$profession->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="inline-btn"><i class="fas fa-trash" style="color:red !important;"></i> Delete</a>
   </div>
   @empty
			<div class="box offer">
            <p>No profession available</p>
            </div>
            
	@endforelse


</div>

</section>
<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>