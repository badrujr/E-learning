<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Minat Bakery - Academy </title>

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style1.css">
  <link rel="stylesheet" href="./assets/css/media_queries.css">
  <link rel="stylesheet" href="./assets/css/animation.css">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700;800;900&family=Roboto:wght@400;500&display=swap"
    rel="stylesheet">

</head>

<body>

  <!--
    - main container
  -->

  <div class="container">

    <!--
      - #HEADER
    -->

    <header>

      <nav class="navbar">

        <div class="navbar-brand">
          <img src="./assets/images/minat-logo.png" alt="minat Logo" style="width:60px;">
        </div>

        <ul class="navbar-nav">

          <li class="nav-item">
            <a href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a href="#about">About Us</a>
          </li>
          <li class="nav-item">
            <a href="#course">Courses</a>
          </li>
          <li class="nav-item">
            <a href="#blog">Blog</a>
          </li>
          <li class="nav-item">
            <a href="#contact">Contact Us</a>
          </li>
          @if(Route::has('login'))

@auth
<li class="nav-item"><a class="nav-link" href="{{url('home')}}">Dashboard</a></li>

@else
<li class="nav-item">
            <a href="{{url('signin')}}">Sign in</a>
          </li>
          <li class="nav-item">
            <a href="{{url('signup')}}">Sign up</a>
          </li>
@endauth

@endif
         
        </ul>

      </nav>

    </header>





    <main>

      <!--
        - #HOME SECTION
      -->

      <section class="home" id="home">

        <div class="home-left">

          <p class="section-subtitle">Welcome To Minat Bakery Academy</p>

          <h1 class="main-heading">
            Get Class From Top
            <span class="underline-img">Tutor <img src="./assets/images/banner-line.png" alt="line"></span>
          </h1>

          <p class="section-text">
          Amina Khalid Ahmed, a 23-year-old entrepreneur, self-taught baker, cake designer, website
          developer and humanitarian based in Mombasa, Kenya. She is a confident, self-driven lady,
          passionate about Business, Cakes, Art, Technology and Community Development. 
          </p>

          <div class="home-btn-group">
            <button class="btn btn-primary">
              <p class="btn-text">Explore Courses</p>
              <span class="square"></span>
            </button>

            <button class="btn btn-secondary">
              <p class="btn-text">Contact Us</p>
              <span class="square"></span>
            </button>
          </div>

        </div>

        <div class="home-right">

          <div class="img-box">

            <img src="./assets/images/banner-img-bg.png" alt="colorful background shape" class="background-shape">
            <img src="./assets/images/Minat.png" alt="banner image" class="banner-img">

          </div>

        </div>

      </section>





      <!--
        - #COURSE CATEGORY SECTION
      -->

      <section class="category">

        <p class="section-subtitle">Course Category</p>

        <h2 class="section-title">Explore Popular Courses</h2>

        <ul class="course-item-group">

        @forelse($categories as $category)
        <li class="course-category-item">

        <div class="wrapper">
          <img src="coursecategoryimage/{{$category->image}}" alt="category icon" class="category-icon default" style=" border-radius:50%;">

          <img src="coursecategoryimage/{{$category->image}}" alt="category icon white"
            class="category-icon hover" style=" border-radius:50%;">
        </div>

        <div class="course-category-content">
          <h3 class="category-title">
            <a href="#">{{$category->name}}</a>
          </h3>

          <p class="category-subtitle">{{$category->description}}</p>
        </div>

        </li>
        @empty
						     <p>No categories available</p>
						@endforelse

        



        </ul>

      </section>





      <!--
        - #ABOUT SECTION
      -->

      <section class="about" id="about">

        <div class="about-left">

          <div class="img-box">
            <img src="./assets/images/about-img-bg.png" alt="about bg" class="about-bg">

            <img src="./assets/images/Minat.png" alt="about person" class="about-img">
          </div>

        </div>

        <div class="about-right">
        <p class="section-subtitle">About Us</p>
          @forelse($aboutus as $about)
          <h2 class="section-title">{{$about->title}}</h2>

          <p class="section-text">{{$about->description}}</p>
          @empty
						     <p>No content available</p>
						@endforelse

          <button class="btn btn-primary">
            <p class="btn-text">Explore More</p>
            <span class="square"></span>
          </button>

        </div>

      </section>





      <!--
        - #COURSE SECTION
      -->

      <section class="course" id="course">

        <p class="section-subtitle">Our Online Courses</p>

        <h2 class="section-title">Find The Right Online Course For You</h2>

        <div class="course-grid">

          @forelse($courses as $key=>$course)
          <div class="course-card">

            <div class="course-banner">
              <img src="coursecategoryimage/{{$course->courseCategory->image}}" alt="course banner">

              <div class="course-tag-box">
                <a href="#" class="badge-tag orange">#cakedecorating</a>
                <a href="#" class="badge-tag blue">#yummy</a>
              </div>
            </div>

            <div class="course-content">

              <h3 class="card-title">
                <a href="#">{{$course->courseCategory->name}}</a>
              </h3>

              <div class="wrapper border-bottom">

                <div class="author">
                  <img src="tutorimage/{{$course->tutor->image}}" alt="course instructor image" class="author-img" style="height:50px;">

                  <a href="#" class="author-name">{{$course->tutor->name}}</a>
                </div>

                <div class="rating">
                  <ion-icon name="star"></ion-icon>
                  <p>5.0 (2k)</p>
                </div>

              </div>

              <div class="wrapper">
                <div class="course-price">KES {{number_format($course->price)}}/=</div>

                <div class="enrolled">
                  <div class="icon-user">
                    <img src="./assets/images/student-icon.png" alt="user icon">
                  </div>

                  <p>6 weeks</p>
                </div>
              </div>

            </div>

          </div>
          @empty
						     <p>No course available</p>
						@endforelse

        </div>

        <button class="btn btn-primary">
          <p class="btn-text">View All Course</p>
          <span class="square"></span>
        </button>

      </section>
      <!--
        - #INSTRUCTOR SECTION
      -->

      <section class="instructor">

        <p class="section-subtitle">Team</p>

        <h2 class="section-title">Our Team member</h2>

        <div class="instructor-grid">

        @forelse($teams as $team)
        <div class="instructor-card">

          <div class="instructor-img-box">
            <img src="teamimage/{{$team->image}}" alt="team member Badru">

            <div class="social-link">
              <a href="{{$team->linkedin_url}}" class="facebook">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>

              <a href="{{$team->instagram_url}}" class="instagram">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>

              <a href="{{$team->twitter_url}}" class="twitter">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </div>
          </div>

          <h4 class="instructor-name">{{$team->name}}</h4>

          <p class="instructor-title">{{$team->title}}</p>

        </div>
        @empty
				<p>No team member available for now</p>
				@endforelse

         

        </div>

      </section>





      <!--
        - #TESTIMONIALS
      -->

      <section class="testimonials">

        <div class="testimonials-left">

          <p class="section-subtitle">Testimonial</p>

          <h2 class="section-title">What Our Student Says About Us</h2>

         

        </div>

        <div class="testimonials-right">
         @forelse($testimonials as $testimonial)
          <div class="testimonials-card">
            <img style="color:darkblue;" src="./assets/images/quote.png" alt="quote icon" class="quote-img">

            <p class="testimonials-text">
              "{{$testimonial->content}}".
            </p>

            <div class="testimonials-client">

              <div class="client-img-box">
                <img style="width:50px;" src="studentimage/{{$testimonial->student->image}}" alt="student badru">
              </div>

              <div class="client-detail">
                <h4 class="client-name">{{$testimonial->student->name}}</h4>

                <p class="client-title">{{$testimonial->student->country->name}}</p>
              </div>

            </div>
          </div>
          @empty
						     <p>No testimonials available for now</p>
						@endforelse

        </div>

      </section>
      <!--
        - #BLOG
      -->

      <section class="blog" id="blog">

        <p class="section-subtitle">Our Blog</p>

        <h2 class="section-title">Latest Blog & News</h2>

        <div class="blog-grid">
        @forelse($blogs->slice(0, 10) as $key=>$blog)
          <div class="blog-card">

            <div class="blog-banner-box">
              <img src="blogimage/{{$blog->image}}" alt="blog banner">
            </div>

            <div class="blog-content">

              <h3 class="blog-title">
                <a href="#">{{$blog->title}}</a>
              </h3>
              <p>{{$blog->content}}</p>
              <br/>
              <div class="wrapper">

                <div class="blog-publish-date">
                  <img src="./assets/images/calendar.png" alt="calendar icon">

                  <a href="#">{{$blog->created_at}}</a>
                </div>

                <div class="blog-comment">
                  <img src="./assets/images/comment.png" alt="comment icon">

                  <a href="#">0 Comment</a>
                </div>

              </div>

            </div>

          </div>
          @empty
						     <p>No news available</p>
						@endforelse

        </div>

      </section>
      <!--
        - #CONTACT
      -->

      <section class="contact">

        <div class="contact-card" id="contact">
          <img src="./assets/images/cta-bg-img.png" alt="shape" class="contact-card-bg">

          <h2>Start Your Best Online Classes With Us</h2>

          <button class="btn btn-primary">
            <p class="btn-text">Contact Us</p>
            <span class="square"></span>
          </button>
        </div>

      </section>

    </main>
    <!--
      - #FOOTER
    -->

    <footer>

      <div class="footer-grid">

        <div class="grid-item">

          <div class="footer-logo">
            <img src="./assets/images/minat-logo.png" alt="educator logo white" style="width:80px;">
          </div>

          <p class="footer-text">
          Minat Cake Zone Academy is a baking school knowledge market place for bakers and beginners in baking. We provide a platform for experienced bakers to perfect their skills, learn different techniques, recipes "secret flavour & tips" through advanced baking
          </p>

          <div class="social-link">
            <a href="#">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
            <a href="#">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
            <a href="#">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
            <a href="#">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </div>

        </div>

        <ul class="grid-item">

          <h4 class="item-heading">Our Link</h4>

          <li class="list-item">
            <a href="#home">Home</a>
          </li>

          <li class="list-item">
            <a href="#about">About Us</a>
          </li>

          <li class="list-item">
            <a href="#course">Courses</a>
          </li>

          <li class="list-item">
            <a href="#blog">Blog</a>
          </li>

          <li class="list-item">
            <a href="#contact">Contact Us</a>
          </li>

        </ul>

        <ul class="grid-item">

          <h4 class="item-heading">Other Link</h4>

          <li class="list-item">
            <a href="#">Tutor</a>
          </li>

          <li class="list-item">
            <a href="#">FAQ</a>
          </li>

          <li class="list-item">
            <a href="#">Event</a>
          </li>

          <li class="list-item">
            <a href="#">Privacy Policy</a>
          </li>

          <li class="list-item">
            <a href="#">Term & Condition</a>
          </li>

        </ul>

        <div class="grid-item">

          <h4 class="item-heading">Subscribe Now</h4>

          <div class="wrapper">
            <input type="text" name="subscribe" placeholder="Email Address">
            
            <button class="send-btn">
              <ion-icon name="paper-plane"></ion-icon>
            </button>
          </div>

        </div>

      </div>

      <p class="copyright">
        Copyright © 2022 <a href="#">minatBakeryAcademy</a>. All rights reserved.
      </p>

    </footer>

  </div>
  <!--
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>