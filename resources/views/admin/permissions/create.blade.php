@extends("admin.index")
@section("content")

<section class="form-container">
<form action="{{route('permissions.store')}}" method="post" enctype="multipart/form-data">
   @csrf
      <h3>Add Permission</h3>
      <p>permission <span>*</span></p>
      <input type="text" name="name" placeholder="eg:delete" class="box">
      @error('name') <span class="alert aletr-danger">{{$message}}</span>@enderror
      <input type="submit" value="submit" name="submit" class="btn">
   </form>
</section>
@stop