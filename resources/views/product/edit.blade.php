@extends('layouts.starlight')

@section('content')
<div class="contaier m-auto">
    <div class="row">
    <div class="col-lg-8">
                <div class="card text-white bg-success mb-3" >
                    <div class="card-header">product</div>
                    <div class="card-body">
                        <form action="{{ route('product_post') }}" method="post">
                            @csrf
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
</div></div>
    
@endsection