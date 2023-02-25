@extends('layout')
@section('title','View Employee')
@section('content')
    <div class="card mb-4 mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            View
            <a href="{{url('employee')}}" class="float-end btn btn-sm btn-success">View</a>
        </div>
        <div class="card-body">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
            @endif

            @if(Session::has('message'))
                <p class="text-success">{{session('message')}}</p>
            @endif
            <form method="post" action="{{url('employee/'.$data->id)}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Department</th>
                        <td>
                            {{$data->department->Name}}
                        </td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>
                            {{$data->name}}
                        </td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>
                            <img src="{{asset('public/images/'.$data->photo)}}" width="200">
                        </td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            {{$data->address}}
                        </td>
                    </tr>
                    <tr>
                        <th>Phone no</th>
                        <td>
                            {{$data->phone}}
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($data->status==1) Active @else Inactive @endif
                        </td>
                    </tr>
                </table>
            </form>

        </div>
    </div>

@endsection


