@extends('admin.admin_layouts.app')

@section('content')

<h1>Edit Model</h1>

<br>

@if(isset(Auth::user()->id) && Auth::user()->id == $model->user_id || Auth::user()->role_as == 1) 

<form action="/dashbord/models/{{$model->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="put">

    

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Name</label>
        <input type="text" class="form-control" name="name" value="{{$model->model_name}}">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Date Prodaction</label>
        <input type="text" class="form-control" name="date_prodaction"value="{{$model->date_prodaction}}">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Car</label>
        <select class="form-control" name="car" id="">
            @foreach($cars as $car)
            <option value="{{$car->id}}">{{$car->name}}</option>
            @endforeach
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
    <a href="/dashbord/models" class="btn btn-secondary">Go back</a>

</form>

@else
<div class="alert alert-danger" role="alert">

You are not allowed to update

</div>

@endif



@endsection('content')
