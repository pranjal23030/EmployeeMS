@extends('layout')
@section('title','Update Department')
@section('content')
    <div class="card mb-4 mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create
            <a href="{{url('department')}}" class="float-end btn btn-sm btn-success">View</a>
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
            <form method="post" action="{{url('department/'.$data->id)}}">
                @method('put')
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>
                            <input type="text" name="Name" value="{{$data->Name}}" class="form-control"/>
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


