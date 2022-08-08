@extends('admin.admin_layouts.app')

@section('content')

@if(Auth::user()->role_as == 1)

<h1>Create New User</h1>

<br>

<form action="/dashbord/users" method="POST" enctype="multipart/form-data">
    @csrf
    

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Name</label>
        <input type="text" class="form-control" name="name">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="text" class="form-control" name="email">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Password</label>
        <input type="text" class="form-control" name="password">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Role</label>
        <select class="form-control" name="role" id="">
            <option value="1">Admin</option>
            <option value="2">Creator</option>
            <option value="0">User</option>
        </select>
    </div>

    

    <br>

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                {{$error}}
                <br>
                <br>
            @endforeach
        </div>

    @endif
    
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/dashbord/users" class="btn btn-secondary">Go back</a>

</form>


@else

<div class="alert alert-danger" role="alert">
    You Dont Have Permission to Access Users
</div>

@endif



@endsection('content')
