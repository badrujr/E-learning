@extends("admin.index")
@section("content")

<section class="form-container">
<form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">
   @csrf
      <h3>Add Role</h3>
      <p>role <span>*</span></p>
      <input type="text" name="name" placeholder="eg:personal assistant" required maxlength="50" class="box">
      @error('name') <span class="alert aletr-danger">{{$message}}</span>@enderror
      <input type="submit" value="submit" name="submit" class="btn">
      @if(session()->has('message'))
        <div class="alert alert-success alert-has-icon" style="color:green; font-size:20px;">
            {{session()->get('message')}}
        </div>
      @endif
   </form>
</section>
@stop