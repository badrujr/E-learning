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

<header class="header">
   
   <section class="flex">

      <a href="{{url('/home')}}" class="logo">Minat Bakery Academy.</a>

      <form action="search.html" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
        
      </div>

      <div class="profile">
         <img src="./assets/images/admin.jpeg" class="image" alt="">
         
         <h3 class="name">{{Auth::user()->name}}</h3>
         <p class="role">{{Auth::user()->role}}</p>
         @if(Route::has('login'))

@auth
<div class="flex-btn">
            <a href="{{url('student/profile')}}" class="option-btn">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();" class="option-btn">Logout</a>
                   
                </form>
            
         </div>

@else
<div class="flex-btn">
            <a href="login.html" class="option-btn">login</a>
            <a href="register.html" class="option-btn">register</a>
         </div>
@endauth

@endif
         
        
      </div>

   </section>

</header>   

@include('admin.sidebar')

<section class="teachers">

<h1 class="heading">our team member</h1>

<form action="" method="post" class="search-tutor">
   <input type="text" name="search_box" placeholder="search team member..." required maxlength="100">
   <button type="submit" class="fas fa-search" name="search_tutor"></button>
</form>

<div class="box-container">
<div class="box offer">
      <h3>add new team member</h3>
      <p>Minat Cake Zone Academy is a baking school knowledge market place for bakers and beginners in baking. We provide a platform for experienced bakers to perfect their skills, learn different techniques, recipes "secret flavour & tips" through advanced baking</p>
      <a href="{{url('admin/team/add-team')}}" class="inline-btn">add new team member</a>
   </div>
   @forelse($teams as $team)
   <div class="box">
      <div class="tutor">
         <img src="teamimage/{{$team->image}}" alt="">
         <div>
            <h3>Name: {{$team->name}}</h3>
            <span>Title: {{$team->title}}</span>
         </div>
      </div>
      <p>Instagram: {{$team->instagram_url}}</p>
      <p>Twitter: {{$team->twitter_url}}</p>
      <p>LinkedIn: {{$team->linkedin_url}}</p>
      <a href="{{url('admin/edit-team',$team->id)}}" class="inline-btn"><i class="fas fa-pencil" style="color:#ffffff !important;"></i> Edit</a>
      <a href="{{url('admin/delete-team',$team->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="inline-btn"><i class="fas fa-trash" style="color:red !important;"></i> Delete</a>
   </div>
   @empty
			<div class="box offer">
            <p>No team member available</p>
            </div>
            
	@endforelse


</div>

</section>
<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>