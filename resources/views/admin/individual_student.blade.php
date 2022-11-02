<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Minat Bakery - Reports</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/assets/css/app.min.css">
  <link rel="stylesheet" href="assets/assets/bundles/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/assets/bundles/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="assets/assets/bundles/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="assets/assets/bundles/summernote/summernote-bs4.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/assets/css/style.css">
  <link rel="stylesheet" href="assets/assets/css/components.css">
  <link rel="stylesheet" href="assets/assets/bundles/fullcalendar/fullcalendar.min.css">
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
        <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Monthly Report:</h4>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{url('retrieve_data')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">From:</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control" name="fromdate">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">To:</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control" name="todate">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="submit" class="btn btn-primary" value="Retrieve Data">
                      </div>
                    </div>
                    </form>
                    
                  </div>
                </div>
              </div>
            </div>
         
           
            <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  </div>
                  
                  <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                
                     <thead>
                     <tr>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Nationality</th>
                        <th>Age</th>
                        <th>Gender</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($data as $value)
                <tr>
                <td>{{$value->fullname}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->nationality}}</td>
                <td>{{$value->age}}</td>
                <td>{{$value->gender}}</td>
                </tr>
                @endforeach
         
        </tbody>
      
    </table>
</div>
</div>
</div>

        
        </section>
       
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div> Minat Bakery <a href="#">Firm</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  @include('admin.script')

   
</body>
</html>