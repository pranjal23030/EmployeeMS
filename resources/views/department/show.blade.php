@extends('layout')
@section('title','View Department')
@section('content')
    <div class="card mb-4 mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            View
            <a href="{{url('department')}}" class="float-end btn btn-sm btn-success">View</a>
        </div>
        <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                            <tr>
                                <td>{{$d->name}}</td>
                                <td>{{$d->address}}</td>
                                <td><img src="{{asset('images/'.$d->photo)}}" width="80"></td>
                            </tr>
                        @endforeach
                </table>
        </div>
    </div>
@endsection



