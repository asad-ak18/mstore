@extends('layouts.starlight')


@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-10">
                <div class="card   mb-3">
                    <div class="card-header bg-primary text-white">
                        <div class="row">
                            <div class="col-lg-6">product name</div>
                            <div class="col-lg-6 text-right"><button class="btn btn-danger" id="delete_all">delete all</button></div>
                        </div>

                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th >?</th>
                                    <th scope="col">sl</th>
                                
                                    <th scope="col">category name</th>
                                    <th scope="col">product name</th>
                                    <th scope="col">product price</th>
                                    <th scope="col">product quantity</th>
                                    <th scope="col"> short description</th>
                                    <th scope="col"> long description</th>
                                    <th scope="col"> product alert</th>
                                    <th scope="col"> Added by whom</th>
                                    <th scope="col"> action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <form action="{{route('checkdelete')}}"  method="post">

                               @csrf
                                @foreach ($product_info as $product_infos)
                                <tr>
                                        <td >
                                                <input type="checkbox" class="all_checkbox"  name="product_id[]" value="{{$product_infos->id}}">
                                                
                                            </td>

                                        <td>{{ $loop->index + 1 }}</td>
                                     
                                        <td>{{ App\Models\category::find($product_infos->category_id)->category_name}}</td>
                                        <td>{{ $product_infos->product_name }}</td>
                                        <td>{{ $product_infos->product_price }}</td>
                                        <td>{{ $product_infos->product_quantity }}</td>
                                        <td>{{ $product_infos->product_short_description }}</td>
                                        <td>{{ $product_infos->product_long_description }}</td>
                                        <td>{{ $product_infos->product_alert }}</td>
                                        <td>{{ App\Models\User::find($product_infos->user_id)->name }}</td>
                                        <td>
                                            <a href="{{route('product_edit',$product_infos->id)}}" class="btn btn-success">edit</a>
                                            <a href="{{ route('product_delete', $product_infos->id) }}"
                                                class="btn btn-danger">delete</a>
                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                          <button class="btn btn-info"> checkdelete</button>
                    </form>
                    </div>
                </div>
            </div>


            <div class="col-lg-2">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">product</div>
                    <div class="card-body">
                        <form action="{{ route('product_post') }}" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                    <select name="category_id" class="form-control">
                                        <option>--choose one--</option>

                                        @foreach ($category_info as $category_infos )
                                            
                                        <option value="{{$category_infos->id}}">{{$category_infos->category_name}}</option>
                                        @endforeach

                                    </select>
                            </div>
                            <div class="form-group">
                                <label>product name</label>
                                <input type="text" class="form-control" placeholder="Enter product name"
                                    name="product_name">
                            </div>
                            <div class="form-group">
                                <label>product price</label>
                                <input type="number" class="form-control" placeholder="Enter product price"
                                    name="product_price">
                            </div>
                            <div class="form-group">
                                <label>product quantity</label>
                                <input type="number" class="form-control" placeholder="Enter product quantity"
                                    name="product_quantity">
                            </div>
                            <div class="form-group">
                                <label>product short description</label>
                                <input type="text" class="form-control" placeholder="Enter product short description"
                                    name="product_short_description">
                            </div>

                            <label>product long description</label>
                            <textarea name="product_long_description" id="" cols="30" rows="10" class="form-control">
                    </textarea>
                            <div class="form-group">
                                <label>product alert</label>
                                <input type="text" class="form-control" placeholder="Enter product alert"
                                    name="product_alert">
                            </div>
                            <div class="form-group">
                                <label>product color</label>
                                <input type="text" class="form-control" placeholder="Enter product color"
                                    name="product_color">
                            </div>
                            <div class="form-group">
                                <label>product photo</label>
                                <input type="file" class="form-control" placeholder="Enter product photo"
                                    name="product_photo">
                            </div>
                            @csrf
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                    <div class="col-lg-12">
                <div class="card   mb-3">
                    <div class="card-header bg-primary text-white">
                        <div class="row">
                            <div class="col-lg-6">product name</div>
                            <div class="col-lg-6 text-right"><button class="btn btn-danger" id="restore_all">restore all</button></div>
                        </div>

                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">sl</th>
                                    <th scope="col">product name</th>
                                    <th scope="col">product price</th>
                                    <th scope="col">product quantity</th>
                                    <th scope="col"> short description</th>
                                    <th scope="col"> long description</th>
                                    <th scope="col"> product alert</th>
                                    <th scope="col"> action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($deleted_product as $deleted_products)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $deleted_products->product_name }}</td>
                                        <td>{{ $deleted_products->product_price }}</td>
                                        <td>{{ $deleted_products->product_quantity }}</td>
                                        <td>{{ $deleted_products->product_short_description }}</td>
                                        <td>{{ $deleted_products->product_long_description }}</td>
                                        <td>{{ $deleted_products->product_alert }}</td>
                                        <td>
                                            <a href="{{route('product_restore',$deleted_products->id)}}" class="btn btn-success">restore</a>
                                            <a href="{{ route('product_forcedelete', $deleted_products->id) }}"
                                                class="btn btn-danger">forcedelete</a>
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



    </div>
@endsection


@section('footer_scripts')

   <script>
        $(document).ready(function(){
          $('#delete_all').click(function (){
               Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
     if (result.isConfirmed) {
     window.location.href =('all_delete')
     }
});
          });
        });
    </script>
   <script>
        $(document).ready(function(){
          $('#restore_all').click(function (){
               Swal.fire({
  title: 'Are you sure?',
  text: "You want to restore it!",
  icon: 'success',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, restore it!'
}).then((result) => {
      if (result.isConfirmed) {
     
      window.location.href ='all_restore';
  }
  
});
});

$('#all_checked').click(function(){
    $('.all_checkbox').attr('checked','checked')
});
$('#all_unchecked').click(function(){
    $('.all_checkedbox').removeAttr("checked")
});
});






    </script>
    
@endsection
