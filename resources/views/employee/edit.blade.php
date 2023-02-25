@extends('layout')
@section('title','Update Employee')
@section('content')
    <div class="card mb-4 mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Update
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
                            <select name="department" class="form-control">
                                <option value="">Select Department</option>
                                @foreach($departmentss as $department)
                                    <option @if($department->id==$data->department_id) selected @endif value="{{$department->id}}">{{$department->Name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>
                            <input type="text" value="{{$data->name}}" name="name" class="form-control"/>
                        </td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>
                            <input type="file" name="photo" class="form-control"/>
                            <p>
                                <img src="{{asset('public/images/'.$data->photo)}}" width="200">
                                <input type="hidden" name="previous_photo" value="{{$data->photo}}">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            <input type="text" value="{{$data->address}}" name="address" class="form-control"/>
                        </td>
                    </tr>
                    <tr>
                        <th>Phone no</th>
                        <td>
                            <input type="text" value="{{$data->phone}}" name="phone" class="form-control"/>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <input @if($data->status==1) checked @endif type="radio" name="status" value="1" /> Active
                            <br>
                            <input @if($data->status==0) checked @endif type="radio" name="status" value="0" /> Inactive
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn btn-primary"value="Submit">
                        </td>
                    </tr>
                </table>
            </form>

        </div>
    </div>

@endsection


