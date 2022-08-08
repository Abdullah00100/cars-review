@extends('admin.admin_layouts.app')

@section('content')

<h1>Create New Product</h1>

<br>

<form action="/dashbord/products" method="POST" enctype="multipart/form-data">
    @csrf
    

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Name</label>
        <input type="text" class="form-control" name="name">
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



@endsection('content')
