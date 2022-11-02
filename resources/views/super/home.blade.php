<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Minat Bakery - Super Dashboard</title>
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
     @include('super.navbar')
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
      
        @include('super.sidebar')
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-green-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-user"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Total Students</h4>
                    <span>{{$student}}</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-cyan-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Total course</h4>
                    <span>{{$courses}}</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-purple-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-user"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Pending Application</h4>
                    <span>{{$count_pending}}</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-orange-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-envelope"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Selected Application</h4>
                    <span>{{$count_accept}}</span>
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-orange-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-male"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Rejected Application</h4>
                    <span>{{$count_decline}}</span>
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-orange-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-female"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Total Application</h4>
                    <span>{{$student}}</span>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
         
          <div class="row">
          <div class="col-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Gender graph</h4>
                  </div>
                  <div class="card-body">
                    <div class="fc-overflow">
                    <div id="piechart_3d" style="width: 350px; height: 300px;"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Age below -18</h4>
                  </div>
                  <div class="card-body">
                    <div class="fc-overflow">
                    <div id="femaledata" style="width: 350px; height: 300px;"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Age above 18+</h4>
                  </div>
                  <div class="card-body">
                    <div class="fc-overflow">
                    <div id="piechart_3d" style="width: 350px; height: 300px;"></div>
                    </div>
                  </div>
                </div>
              </div>
          
            </div>
            <div class="row">
            
            
            </div>
           
            <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Admission Requests for students</h4>
                  </div>
                  <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
                  <tr>
            <th>Image</th>
            <th>FullName</th>
            <th>Course</th>
            <th>Gender</th>
            <th>Dob</th>
            <th>Nationality</th>
            <th>Status</th>
                  </tr>
              </thead>
              <tbody>
         @foreach($students as $studentss)
         <tr>
         <td><img style="border-radius:50%; height:50px;" src="studentimage/{{$studentss->image}}"></td>
          <td>{{$studentss->fullname}}</td>
          <td>{{$studentss->course_applied}}</td>
          <td>{{$studentss->gender}}</td>
          <td>{{$studentss->dob}}</td>
          <td>{{$studentss->nationality}}</td>
          <td>{{$studentss->status}}</td>
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
          Copyright &copy; 2022 <div class="bullet"></div> Minat Bakery <a href="#">Academy</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
@include('super.script')
<!--Gender graph -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Gender', 'Male & Female'],
         <?php echo $chartData; ?>
        ]);

        var options = {
          title: 'Gender statistics',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Gender', 'Age'],
        
        ]);

        var options = {
          title: 'Gender statistics',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('femaledata'));
        chart.draw(data, options);
      }
    </script>
</body>
</html>