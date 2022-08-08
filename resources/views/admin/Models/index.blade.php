@extends('admin.admin_layouts.app')

@section('content')

    <h1>Car Models</h1>

    <br>
    @if(Auth::user())
    <a href="/dashbord/models/create" type="button" class="btn btn-success">Create New Model</a>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Car</th>
                <th scope="col">Date Prodaction</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

        @foreach($models as $model)
            <tr>
                <td>{{$model->model_name}}</td>
                <td style="max-width: 350px;">{{$model->car->name}}</td>
                <td>{{$model->date_prodaction}}</td>
                <td>
                @if(isset(Auth::user()->id) && Auth::user()->id == $model->user_id || Auth::user()->role_as == 1) 

                <form action="/dashbord/models/{{$model->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="/dashbord/models/{{$model->id}}/edit" class="btn btn-outline-primary">Edit</a>
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
                @endif

                    
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection('content')
