<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Minat - Bakery | Course</title>
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
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add a Course</h4>
                  </div>
                  <div class="card-body">
                  @if(session()->has('message'))
                    <div class="alert alert-success alert-has-icon">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{session()->get('message')}}
                    </div>
                  @endif
                    <form method="POST" action="{{url('upload_course')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category:</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="category">
                        <option>***Select***</option>
                        <option>Certficate</option>
                       <option>Diploma</option>
                        </select>
                      </div>
                    </div>
                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title:</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="title">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Body</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="form-control" name="body" id="editor"></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="form-control" name="content" id="editorr"></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image:</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="file" class="form-control" name="file">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tag:</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="tag">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="submit" class="btn btn-primary" value="Save Data">
                      </div>
                    </div>
                    </form>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
  
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div> Minat Bakery <a href="#">Academy</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
 <!-- General JS Scripts -->
  <script src="assets/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/assets/bundles/summernote/summernote-bs4.js"></script>
  <script src="assets/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="assets/assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
  <script src="assets/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/assets/js/page/create-post.js"></script>
  <!-- Template JS File -->
  <script src="assets/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/assets/js/custom.js"></script>
   <!-- ckeditor -->
  <script src="assets/assets/js/ckeditor/ckeditor.js"></script>

  <script type="text/javascript">
    CKEDITOR.replace('editor');
  </script>
  
  <script type="text/javascript">
    CKEDITOR.replace('editorr');
  </script>
</body>

</html>