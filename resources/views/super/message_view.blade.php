<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Minat Bakery - Admin Dashboard</title>
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
                class="logo-name">Minat bakery</span>
            </a>
          </div>
      
        @include('super.sidebar')
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            <div class="row">
            
            
            </div>
           
            <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>User Message</h4>
                  </div>
                  <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
                  <tr>
            <th>Fullname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
                  </tr>
              </thead>
              <tbody>
         @foreach($msg as $message)
         <tr>
          <td>{{$message->name}}</td>
          <td>{{$message->email}}</td>
          <td>{{$message->phone}}</td>
          <td>{{$message->message}}</td>
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
          Copyright &copy; 2022 <div class="bullet"></div> Minat cake <a href="#">Academy</a>
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