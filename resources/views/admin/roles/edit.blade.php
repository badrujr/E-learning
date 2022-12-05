@extends("admin.index")
@section("content")


<section class="contact">

   <div class="row">


   <form action="{{route('roles.update',$role->id)}}" method="post" enctype="multipart/form-data">
@method('PATCH') 
@csrf
      <h3>Edit role</h3>
      <p>Name <span>*</span></p>
      <input type="text" name="name" value="{{$role->name}}" required maxlength="50" class="box">
      @error('name') <span class="alert aletr-danger">{{$message}}</span>@enderror
      <input type="submit" value="submit" name="submit" class="btn">
   </form>

   </div>

   <div class="box-container">

      <div class="box">
      <h3>Role permission</h3>
      @if($role->permissions)
    @foreach($role->permissions as $rolePermission)
    <form action="{{ route('roles.permissions.revoke', [$role->id, $rolePermission->id])}}" method="post">
      @csrf
      @method('DELETE')
      <button class="inline-btn" type="submit"><i class="fas fa-trash" style="color:red !important;"></i> {{$rolePermission->name}}</button>
      </form>
    @endforeach
    @endif
      </div>
   </div>
   <div class="row">
   <form action="{{route('roles.permissions')}}" method="post" enctype="multipart/form-data">
      @csrf
      <h3>Assign role</h3>
      <p>Permission <span>*</span></p>
      <input type="hidden" name="role_id" value="{{$role->id}}" required maxlength="50" class="box">
      <select name="permission_id" class="box" required>
         <option value="">-- select permission</option>
         @forelse($permissions as $permission)
         <option value="{{$permission->id}}">{{$permission->name}}</option>
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