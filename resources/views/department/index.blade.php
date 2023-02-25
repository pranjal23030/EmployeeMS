@extends('layout')
@section('title','Departments')
@section('content')
    <div class="card mb-4 mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Departments
            <a href="{{url('department/create')}}" class="float-end btn btn-sm btn-success">Add New</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                @if($data)
                    @foreach($data as $d)
                <tr>
                    <td>{{$d->id}}</td>
                    <td>{{$d->Name}}</td>
                    <td>
                        <a href="{{url('department/'.$d->id)}}" class="btn btn-warning btn-sm ">Read</a>
                        <a href="{{url('department/'.$d->id.'/edit')}}" class="btn btn-info btn-sm">Update</a>
                        <a onclick="return confirm('Do you really wanna delete this data??')" href="{{url('department/'.$d->id.'/delete')}}" class="btn btn-danger btn-sm">Delete</a>
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

