<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="./assets/css/style.css">
   <base href="/public">
  @include('css')
</head>
<body>

@include('admin.header') 

@include('admin.sidebar')

<section class="dashboard">

   <h1 class="heading">Manage countries, Hi! {{Auth::user()->name}}</h1>
   <div class="table">
<div class="table_header">
<p>List Of Countries</p>
</div>
<div class="table_section">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countries as $key=>$country)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$country->name}}</td>
                <td>{{$country->created_at}}</td>
                <td>{{$country->updated_at}}</td>
                <td>
                    <button><a href = "{{url('admin/country/edit-country',$country->id)}}"><i class="fas fa-pencil" style="color:#ffffff !important;"></i></a></button>
                    <button><a href = "{{url('admin/delete-country',$country->id)}}" onclick="return confirm('Are you sure you want to delete?')"><i class="fas fa-trash" style="color:red !important;"></i></a></button>
                </td>
            </tr>
            @endforeach
          
        </tbody>
    </table>
</div>
<div class="pagination">
<div><i class="fas fa-angles-left"></i></div>
<div><i class="fas fa-chevron-left"></i></div>
<div>1</div>
<div>2</div>
<div><i class="fas fa-chevron-right"></i></div>
<div><i class="fas fa-angles-right"></i></div>
</div>
</div>
   
</section>

<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
   $(document).ready(function () {
    $('#example').DataTable();
});
</script>

</body>
</html>