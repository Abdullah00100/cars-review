@extends('admin.admin_layouts.app')

@section('content')

    <h1>Products</h1>

    <br>
    @if(Auth::user())

    <a href="products/create" type="button" class="btn btn-success">Create New Product</a>

    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
                
            </tr>
        </thead>
        <tbody>

        @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>
                @if(isset(Auth::user()->id) && Auth::user()->id == $product->user_id || Auth::user()->role_as == 1) 

                <form action="/dashbord/engines/{{$product->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="/dashbord/products/{{$product->id}}/edit" class="btn btn-outline-primary">Edit</a>
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
                @endif

                    
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection('content')
