@extends('admin.admin_layouts.app')

@section('content')

    <h1>Users</h1>

    @if(Auth::user()->role_as == 1)



    <br>
    @if(Auth::user())
    <a href="/dashbord/users/create" type="button" class="btn btn-success">Create New User</a>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>@if($user->role_as == 1)
                    Admin
                    @elseif($user->role_as == 0)
                    User
                    @else
                    Creater
                    @endif
                
                </td>
                <td>
                @if(Auth::user()->role_as == 1) 

                <form action="/dashbord/users/{{$user->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
                @endif

                    
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    @else

    <div class="alert alert-danger" role="alert">
        You Dont Have Permission to Access Users Table
    </div>

    @endif

@endsection('content')
