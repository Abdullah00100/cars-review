@extends('admin.admin_layouts.app')

@section('content')

<h1>Create New Product</h1>

<br>

@if(isset(Auth::user()->id) && Auth::user()->id == $product->user_id || Auth::user()->role_as == 1) 


<form action="/dashbord/engines/{{$product->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="put">

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Name</label>
        <input type="text" class="form-control" name="engine_name" value="{{$product->name}}">
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
    <a href="/dashbord/products" class="btn btn-secondary">Go back</a>

</form>

@else
<div class="alert alert-danger" role="alert">

You are not allowed to update

</div>

@endif



@endsection('content')
