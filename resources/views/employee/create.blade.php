@extends('layout')
@section('title','Add Employee')
@section('content')
    <div class="card mb-4 mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create
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
            <form method="post" action="{{url('employee')}}" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Department</th>
                        <td>
                            <select name="department" class="form-control">
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->Name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>
                            <input type="text" name="name" class="form-control"/>
                        </td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>
                            <input type="file" name="photo" class="form-control"/>
                        </td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            <input type="text" name="address" class="form-control"/>
                        </td>
                    </tr>
                    <tr>
                        <th>Phone no</th>
                        <td>
                            <input type="text" name="phone" class="form-control"/>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                             <input type="radio" name="status" value="1" /> Active
                            <br>
                             <input type="radio" checked="checked" name="status" value="0" /> Inactive
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


