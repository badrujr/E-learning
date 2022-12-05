@extends("admin.index")
@section("content")

<section class="teachers">

<h1 class="heading">Permission Management</h1>
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
   @forelse($permissions as $permission)
   <div class="box">
      <div class="tutor">
         <div>
            <h3>Name: {{$permission->name}}</h3>
         </div>
      </div>
      <p>Created at: {{date('F j,Y', strtotime($permission->created_at))}}</p>
      <a href="{{route('permissions.edit',$permission->id)}}" class="inline-btn"><i class="fas fa-pencil" style="color:#ffffff !important;"></i> Edit</a>
      <form action="{{ route('permissions.destroy', $permission->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="inline-btn" type="submit"><i class="fas fa-trash" style="color:red !important;"></i> Delete</button>
      </form>
   </div>
   @empty
			<div class="box offer">
            <p>No permission available</p>
            </div>
            
	@endforelse


</div>

</section>
@stop