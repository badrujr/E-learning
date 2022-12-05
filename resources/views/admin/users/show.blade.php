@extends("admin.index")
@section("content")


<section class="contact">

   <div class="row">
<div class="box-container">
    <span style="font-size:15px;">Fullname: {{$user->name}}</span>
</br/>
</div>

   </div>
   <div class="box-container">

<div class="box">
<h3>Permission role</h3>
@if($user->roles)
@foreach($user->roles as $userRole)
<form action="{{ route('users.roles.remove', [$user->id, $userRole->id])}}" method="post">
@csrf
@method('DELETE')
<button class="inline-btn" type="submit"><i class="fas fa-trash" style="color:red !important;"></i> {{$userRole->name}}</button>
</form>
@endforeach
@endif
</div>
</div>
<div class="row">
<form action="{{route('users.roles')}}" method="post" enctype="multipart/form-data">
@csrf
<h3>Assign role</h3>
<p>Role <span>*</span></p>
<input type="hidden" name="user_id" value="{{$user->id}}" required maxlength="50" class="box">
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


   <div class="box-container">

      <div class="box">
      <h3>Permission</h3>
      @if($user->permissions)
    @foreach($user->permissions as $userPermission)
    <form action="{{ route('users.permissions.revoke', [$user->id, $userPermission->id])}}" method="post">
      @csrf
      @method('DELETE')
      <button class="inline-btn" type="submit"><i class="fas fa-trash" style="color:red !important;"></i> {{$userPermission->name}}</button>
      </form>
    @endforeach
    @endif
      </div>
   </div>
   <div class="row">
   <form action="{{route('users.permissions')}}" method="post" enctype="multipart/form-data">
      @csrf
      <h3>Assign role</h3>
      <p>Permission <span>*</span></p>
      <input type="hidden" name="user_id" value="{{$user->id}}" required maxlength="50" class="box">
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