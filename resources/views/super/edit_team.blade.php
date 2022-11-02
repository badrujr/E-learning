<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Minat - Bakery | Edit Team</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <base href="/public">
  @include('super.css')
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
            <a href=""><span
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
                    <h4>Edit your team member</h4>
                  </div>
                  <div class="card-body">
                  @if(session()->has('message'))
                    <div class="alert alert-success alert-has-icon">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{session()->get('message')}}
                    </div>
                  @endif
                    <form method="POST" action="{{url('editteam_form',$edit_team->id)}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Old Image:</label>
                      <div class="col-sm-12 col-md-7">
                          <img src="teamimage/{{$edit_team->image}}" style="border-radius:50%;height:40px;">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Change Image:</label>
                      <div class="col-sm-12 col-md-7">
        
                        <input type="file" class="form-control" name="file">
                      </div>
                    </div>
                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title:</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="title" value="{{$edit_team->title}}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fullname:</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="name" value="{{$edit_team->name}}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Instagram:</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="instagram" value="{{$edit_team->instagram}}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Facebook:</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="facebook" value="{{$edit_team->facebook}}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Linkedin:</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="linkedin" value="{{$edit_team->linkedin}}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="submit" class="btn btn-primary" value="Edit-team-member">
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
  @include('super.script')
</body>
</html>