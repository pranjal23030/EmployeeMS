@extends('layout')
@section('title','Employees')
@section('content')
    <div class="card mb-4 mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Employees
            <a href="{{url('employee/create')}}" class="float-end btn btn-sm btn-success">Add New</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Department</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($data)
                    @foreach($data as $d)
                <tr>
                    <td>{{$d->id}}</td>
                    @if(isset($d->department))
                        <td>{{$d->department->Name}}</td>
                    @else
                        <td></td>
                    @endif
                    <td>{{$d->name}}</td>
                    <td><img src="{{asset('images/'.$d->photo)}}" width="80"></td>
                    <td>{{$d->address}}</td>
                    <td>
                        <a href="{{url('employee/'.$d->id)}}" class="btn btn-warning btn-sm ">Read</a>
                        <a href="{{url('employee/'.$d->id.'/edit')}}" class="btn btn-info btn-sm">Update</a>
                        <a onclick="return confirm('Do you really wanna delete this data??')" href="{{url('employee/'.$d->id.'/delete')}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('public')}}/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{asset('public')}}/js/datatables-simple-dem7o.js"></script>


@endsection

