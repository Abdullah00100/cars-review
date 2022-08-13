@extends('admin.admin_layouts.app')

@section('content')

    <h1>Engines</h1>

    <br>
    @if(Auth::user())

    <a href="engines/create" type="button" class="btn btn-success">Create New Engine</a>

    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Car model</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

        @foreach($engines as $engine)
            <tr>
                <td>{{$engine->engine_name}}</td>
                <td>{{ $engine->carModels->model_name}}</td>
                <td>
                @if(isset(Auth::user()->id) && Auth::user()->id == $engine->user_id || Auth::user()->role_as == 1) 

                <form action="/dashbord/engines/{{$engine->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="/dashbord/engines/{{$engine->id}}/edit" class="btn btn-outline-primary">Edit</a>
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
                @endif

                    
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection('content')
