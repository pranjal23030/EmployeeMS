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
                    <tr>
                        <th>Name</th>
                        <td>
                            {{$data->Name}}
                        </td>
                    </tr>
                </table>
        </div>
    </div>

@endsection



