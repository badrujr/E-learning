<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Minat - Bakery | List Course</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

   <!-- General CSS Files -->
   <link rel="stylesheet" href="assets/assets/css/app.min.css">
  <link rel="stylesheet" href="assets/assets/bundles/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/assets/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="assets/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/assets/css/style.css">
  <link rel="stylesheet" href="assets/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/assets/img/favicon.ico' />

</head>

<body>
<div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
     @include('admin.navbar')
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="">
            <center>
              <img src="assets/images/minat-logo.png" alt="" style="height:120px;"/>
              </center>
              <span
                class="logo-name">Minat Bakery</span>
            </a>
          </div>
      
        @include('admin.sidebar')
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Manage Your Team</h4>
                  </div>
                  {{$date}}
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>
                          <th>Image</th>
                            <th>Title</th>
                            <th>Fullname</th>
                            <th>Instagram</th>
                            <th>Facebook</th>
                            <th>linkedin</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($team as $teams)
                         <tr>
                         <td><img style="border-radius:50%; height:80px;" src="teamimage/{{$teams->image}}"></td>
                          <td>{{$teams->title}}</td>
                          <td>{{$teams->name}}</td>
                          <td>{{strip_tags($teams->instagram)}}</td>
                          <td>{{strip_tags($teams->facebook)}}</td>
                          <td>{{$teams->linkedin}}</td>
                          <td><a href = "{{url('edit_team',$teams->id)}}"><i style="color:green;" data-feather="edit"></i></a></td>
                          <td><a href ="{{url('delete_team',$teams->id)}}" onclick="return confirm('Are you sure you want to delete?')" ><i style="color:red;" data-feather="trash"></i></a></td>
                         </tr>
                         @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        
      <footer class="main-footer">
      <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div> Minat Bakery <a href="#">Academy</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  @include('admin.script')
</body>
</html>