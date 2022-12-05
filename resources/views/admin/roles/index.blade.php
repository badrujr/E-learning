@extends("admin.index")
@section("content")

<section class="teachers">

<h1 class="heading">Roles Management</h1>
@if(session()->has('message'))
        <div class="alert alert-warning alert-has-icon" style="color:red; font-size:20px;">
        {{session()->get('message')}}
        </div>
        @else
        <div class="" style="color:red !important; font-size:20px;">
        {{session()->get('message')}}
        </div>
      @endif
<div class="box-container">
   @forelse($roles as $role)
   <div class="box">
      <div class="tutor">
         <div>
            <h3>Name: {{$role->name}}</h3>
         </div>
      </div>
      <p>Created at: {{date('F j,Y', strtotime($role->created_at))}}</p>
      <a href="{{route('roles.edit',$role->id)}}" class="inline-btn"><i class="fas fa-pencil" style="color:#ffffff !important;"></i> Edit</a>
      <form action="{{ route('roles.destroy', $role->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="inline-btn" type="submit"><i class="fas fa-trash" style="color:red !important;"></i> Delete</button>
      </form>
   </div>
   @empty
			<div class="box offer">
            <p>No role available</p>
            </div>
            
	@endforelse


</div>

</section>
@stop