@extends('layouts.starlight')
{{-- @extends('layouts.app') --}}
@section('title')
  Dashboard
@endsection
@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card  mb-3" >
  <div class="card-header text-white bg-primary">customer :{{$user_info->count()}}</div>
  <div class="card-body">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">sl no</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">created_at</th>
      <th scope="col">updated_at</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($user_info as $user_infos )
        
    <tr>
      <th scope="row">{{$loop->index+1}}</th>
      <td>{{$user_infos->name}}</td>
      <td>{{$user_infos->email}}</td>
      <td>{{$user_infos->created_at}}</td>
      <td>{{$user_infos->updated_at}}</td>
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
</div>
@endsection







