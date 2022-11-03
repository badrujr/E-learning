<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="./assets/images/logo-minaa.jpg" class="image" alt="">
      <h3 class="name">E-Learning</h3>
      <p class="role">Management system</p>
      
   </div>

   <nav class="navbar">
      <a href="{{url('/home')}}"><i class="fas fa-home"></i><span>Home</span></a>
      <a href="{{url('/admin/users/manage-user')}}"><i class="fas fa-users"></i><span>User management</span></a>
      <a href="{{url('/admin/team/manage-team')}}"><i class="fas fa-user"></i><span>Team</span></a>
      <a href="{{url('/admin/about/add-about')}}"><i class="fas fa-shop"></i><span>About us</span></a>
      <a href="{{url('admin/blog/manage-blog-info')}}"><i class="fas fa-spinner"></i><span>Blog</span></a>
      <a href="{{url('admin/testimonial/manage-testimonial')}}"><i class="fas fa-comment"></i><span>Testimonial</span></a>
      <a href="{{url('admin/payment/manage-payment')}}"><i class="fas fa-shopping-cart"></i><span>Payment</span></a>
      <a href="{{url('admin/payment/add-invoice')}}"><i class="fas fa-payment"></i><span>Invoice</span></a>
   </nav>

</div>