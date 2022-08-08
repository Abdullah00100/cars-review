@extends('admin.admin_layouts.app')

@section('content')
<h1>Edit Car</h1>

<br>

@if(isset(Auth::user()->id) && Auth::user()->id == $car->user_id || Auth::user()->role_as == 1) 


<form action="/dashbord/cars/{{$car->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Name</label>
        <input type="text" class="form-control" name="name" value="{{$car->name}}">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"> Founeded</label>
        <input type="number" class="form-control" name="founded"value="{{$car->founded}}">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"> Description</label>
        <input type="text" class="form-control" name="description"value="{{$car->description}}">
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
    <a href="/dashbord/cars" class="btn btn-secondary">Go back</a>
</form>

@else
<div class="alert alert-danger" role="alert">

You are not allowed to update

</div>

@endif


@endsection('content')
