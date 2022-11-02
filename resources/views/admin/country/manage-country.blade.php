<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
   
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

<section class="dashboard">

   <h1 class="heading">Manage countries, Hi! {{Auth::user()->name}}</h1>
   <div class="table">
<div class="table_header">
<p>List Of Countries</p>
</div>
<div class="table_section">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countries as $key=>$country)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$country->name}}</td>
                <td>{{$country->created_at}}</td>
                <td>{{$country->updated_at}}</td>
                <td>
                    <button><a href = "{{url('admin/country/edit-country',$country->id)}}"><i class="fas fa-pencil" style="color:#ffffff !important;"></i></a></button>
                    <button><a href = "{{url('admin/delete-country',$country->id)}}" onclick="return confirm('Are you sure you want to delete?')"><i class="fas fa-trash" style="color:red !important;"></i></a></button>
                </td>
            </tr>
            @endforeach
          
        </tbody>
    </table>
</div>
<div class="pagination">
<div><i class="fas fa-angles-left"></i></div>
<div><i class="fas fa-chevron-left"></i></div>
<div>1</div>
<div>2</div>
<div><i class="fas fa-chevron-right"></i></div>
<div><i class="fas fa-angles-right"></i></div>
</div>
</div>
   
</section>

<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
   $(document).ready(function () {
    $('#example').DataTable();
});
</script>

</body>
</html>