@extends("admin.index")
@section("content")


<section class="contact">

   <div class="row">


   <form action="{{route('permissions.update',$permission->id)}}" method="post" enctype="multipart/form-data">
@method('PATCH') 
@csrf
      <h3>Edit permission</h3>
      <p>Name <span>*</span></p>
      <input type="text" name="name" value="{{$permission->name}}" required maxlength="50" class="box">
      @error('name') <span class="alert aletr-danger">{{$message}}</span>@enderror
      <input type="submit" value="submit" name="submit" class="btn">
   </form>

   </div>

   <div class="box-container">

      <div class="box">
      <h3>Permission role</h3>
      @if($permission->roles)
    @foreach($permission->roles as $permissionRole)
    <form action="{{ route('permissions.roles.remove', [$permission->id, $permissionRole->id])}}" method="post">
      @csrf
      @method('DELETE')
      <button class="inline-btn" type="submit"><i class="fas fa-trash" style="color:red !important;"></i> {{$permissionRole->name}}</button>
      </form>
    @endforeach
    @endif
      </div>
   </div>
   <div class="row">
   <form action="{{route('permissions.roles')}}" method="post" enctype="multipart/form-data">
      @csrf
      <h3>Assign role</h3>
      <p>Role <span>*</span></p>
      <input type="hidden" name="permission_id" value="{{$permission->id}}" required maxlength="50" class="box">
      <select name="role_id" class="box" required>
         <option value="">-- select role</option>
         @forelse($roles as $role)
         <option value="{{$role->id}}">{{$role->name}}</option>
         @empty
         <p>No data available</p>
         @endforelse
      </select>
      @error('name') <span class="alert aletr-danger">{{$message}}</span>@enderror
      <input type="submit" value="Assign" name="submit" class="btn">
   </form>
   </div>

</section>

@stop