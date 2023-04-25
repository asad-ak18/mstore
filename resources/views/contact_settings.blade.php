@extends('layouts.starlight')


@section('content')
    <div class="container">
        <div class="row">




            <div class="col-lg-12">
                <div class="card text-white bg-success mb-3" >
                    <div class="card-header">contact info</div>
                    <div class="card-body"> 
                        <form action="{{route('contact_settings_post')}}" method="post" enctype="multipart/form-data">

                            @csrf
                       
                            <div class="form-group">
                                <label>address</label>
                                <input type="text" class="form-control" placeholder="Enter address"
                                    name="contact_setting_address">
                            </div>
                            <div class="form-group">
                                <label>phone</label>
                                <input type="text" class="form-control" placeholder="Enter phone number"
                                    name="contact_phone">
                            </div>
                            <div class="form-group">
                                <label> Support</label>
                                <input type="email" class="form-control" placeholder="Enter email contact"
                                    name=" email_contact">
                            </div>
                            @csrf
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection



