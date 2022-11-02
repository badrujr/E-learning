
<header class="header">
   
   <section class="flex">

      <a href="{{url('/home')}}" class="logo">Minat CakeZone Academy.</a>

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
         <img src="studentimage/{{Auth::user()->student->image}}" class="image" alt="">
         
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