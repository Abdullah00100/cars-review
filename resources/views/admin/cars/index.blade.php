@extends('admin.admin_layouts.app')



@section('content')

    <h1>Cars</h1>

    <br>
   @if(Auth::user())
    <a href="/dashbord/cars/create" type="button" class="btn btn-success">Create New Car</a>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Founded</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

        @foreach($cars as $car)
            <tr>
                <td style="font-family:Cursive;"><a style="text-decoration:none; color:black;" href="{{route('cars.show', ['car' => $car->id])}}">{{$car->name}}</a></td>
                <td style="max-width: 350px;">{{$car->description}}</td>
                <td>{{$car->founded}}</td>
                <td>

                @if(isset(Auth::user()->id) && Auth::user()->id == $car->user_id || Auth::user()->role_as == 1) 
                <form action="/dashbord/cars/{{$car->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="/dashbord/cars/{{$car->id}}/edit" class="btn btn-outline-primary">Edit</a>
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
                @endif

                    
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{$cars->links()}}

@endsection('content')
