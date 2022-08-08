@extends('admin.admin_layouts.app')

@section('content')

<h1>Create New Engine</h1>

<br>

@if(isset(Auth::user()->id) && Auth::user()->id == $engine->user_id || Auth::user()->role_as == 1) 


<form action="/dashbord/engines/{{$engine->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="put">

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Name</label>
        <input type="text" class="form-control" name="engine_name" value="{{$engine->engine_name}}">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Model</label>
        <select class="form-control" name="model_id" id="">
            @foreach($models as $model)
            <option value="{{$model->id}}">{{$model->model_name}}</option>
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
    <a href="/dashbord/engines" class="btn btn-secondary">Go back</a>

</form>

@else
<div class="alert alert-danger" role="alert">

You are not allowed to update

</div>

@endif



@endsection('content')
