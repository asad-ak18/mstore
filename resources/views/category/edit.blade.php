@extends('layouts.app')

@section('title')
  category edit
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card  mb-3" >
  <div class="card-header text-white bg-primary">category edit</div>
  <div class="card-body">
        
  <form action="{{route('category_edit_post')}}" method="post">
    @csrf
  <div class="form-group">
    <label >category name</label>
    <input type="hidden" class="form-control"  placeholder="Enter category name" name="category_id"  value="{{$category_id->id}}">
    <input type="text" class="form-control"  placeholder="Enter category name" name="category_name">
   
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
        </div>
    </div>
</div>


@endsection