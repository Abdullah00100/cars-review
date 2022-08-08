@extends('admin.admin_layouts.app')

@section('content')

<h1>Create New Engines</h1>

<br>

<form action="/dashbord/engines" method="POST" enctype="multipart/form-data">
    @csrf
    

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Name</label>
        <input type="text" class="form-control" name="name">
    </div>


    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"> Model</label>
        <select class="form-control" name="model" id="">
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



@endsection('content')
