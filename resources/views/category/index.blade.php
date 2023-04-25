@extends('layouts.starlight')
@section('title')
  category index
@endsection

@section('content')
<div class="container">
     <div class="row">
        <div class="col-lg-8">
            <div class="card  mb-3">
  <div class="card-header text-white bg-success">
        <div class="row">
          <div class="col-10">category name</div>
          <div class="col-2 text-right">
            <button class="btn btn-danger" id="delete_all_btn">delete_all</button>
          </div>
        </div>


  </div>
  <div class="card-body">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">?delete</th>
      <th scope="col">sl</th>
      <th scope="col">id</th>
      <th scope="col">category name</th>
      <th scope="col">created_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     <form action="{{route('checked_delete')}}" method="post">
      @csrf
  @foreach ($category_infos as $category_info )
      
  <tr>
      <td><input type="checkbox" class="checked_all" name="category_id[]" value="{{$category_info->id}}"></td>
    <td scope="row">{{$loop->index+1}}</td>
    <td scope="row">{{$category_info->id}}</td>
    <td>{{$category_info->category_name}}</td>
    <td>{{$category_info->created_at}}</td>
    <td>
        <a href="{{route('category_edit',$category_info->id)}}" class="btn btn-success"> edit</a>
        <a href="{{route('category_delete',$category_info->id)}}" class="btn btn-danger">delete</a>
    </td>
 
  </tr>
  @endforeach
  
  </tbody>
</table>
     <button class="btn btn-danger"  id="checked_all_btn" type="button">checked all</button>
     <button class="btn btn-warning"  id="unchecked_all_btn" type="button">unchecked all</button>
     <button class="btn btn-info"  id="unchecked_all_btn" type="submit">check  delete</button>
    </form>
  </div>
</div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-3" style="max-width: 18rem;">
  <div class="card-header text-white bg-primary ">add category</div>
  <div class="card-body">
  <form action="{{route('category_post')}}" method="post">
    @csrf
  <div class="form-group">
    <label >category name</label>
    <input type="text" class="form-control"  placeholder="Enter category name" name="category_name">
     
  </div>
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@error('category_name')

<span class="text-danger">{{$message}}</span>
       
     @enderror
    


  </div>
</div>
        </div>
     </div>



     <div class="row">
        <div class="col-lg-8">
            <div class="card  mb-3" >
               <div class="card-header text-white bg-success">
             <div class="row">
          <div class="col-10"> deleted category name</div>
        <div class="col-2 text-right">
      <button class="btn btn-warning" id="category_all_restore">restore_all</button>
    </div>
   </div>


  </div>
  <div class="card-body">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">sl</th>
      <th scope="col">id</th>
      <th scope="col">category name</th>
      <th scope="col">created_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($deleted_category as $deleted_categorys )
      
  <tr>
    <th scope="row">{{$loop->index+1}}</th>
    <th scope="row">{{$deleted_categorys->id}}</th>
    <td>{{$deleted_categorys->category_name}}</td>
    <td>{{$deleted_categorys->created_at}}</td>
    <td>
        <a href="{{route('category_restore',$deleted_categorys->id)}}" class="btn btn-success"> restore</a>
        <a href="{{route('category_forcedelete',$deleted_categorys->id)}}" class="btn btn-danger">force delete</a>
    </td>
 
  </tr>
  @endforeach
  
  </tbody>
</table>
  </div>
</div>
        </div>
   
     </div>
</div>


@endsection


@section('footer_scripts')
   <script>
        $(document).ready(function(){
          $('#delete_all_btn').click(function (){
               Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
     window.location.href =('all/delete');
})
          });
        });
    </script>
   <script>
        $(document).ready(function(){
          $('#category_all_restore').click(function (){
               Swal.fire({
  title: 'Are you sure?',
  text: "You want to restore it!",
  icon: 'success',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, restore it!'
}).then((result) => {
     window.location.href =('category_all_restore')
  
});
  });
});
$('#checked_all_btn').click(function(){
     $('.checked_all').attr( 'checked', 'checked' )
});
$('#unchecked_all_btn').click(function(){
     $('.checked_all').removeAttr("checked")
});

    </script>

    
@endsection
 