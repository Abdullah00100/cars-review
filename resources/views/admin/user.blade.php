@extends('admin.admin_layouts.app')

@section('content')



<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">Edit Profile</h4>
                </div>
                <div class="content">
                    <form>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Company (disabled)</label>
                                    <input type="text" class="form-control" disabled placeholder="Company" value="Creative Code Inc.">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Username" value="michael23">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="Company" value="Mike">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" value="Andrew">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" placeholder="City" value="Mike">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="number" class="form-control" placeholder="ZIP Code">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>About Me</label>
                                    <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..." />
                </div>
               
                <div class="content">
                    <div class="author">
                        <a href="#">
                            <img class="avatar border-gray" src="{{asset('admin/img/faces/face-3.jpg')}}" alt="..." />

                            <h4 class="title">{{Auth::user()->name}}<br />
                                <small>michael24</small>
                            </h4>
                        </a>
                    </div>
                    <p class="description text-center"> "Lamborghini Mercy <br>
                        Your chick she so thirsty <br>
                        I'm in that two seat Lambo"
                    </p>
                </div>
                <hr>
                <div class="text-center">
                    <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                    <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                    <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                </div>
            </div>
        </div>

    </div>
    <h1>Posted Cars</h1>
    <br>
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
@if($models->count())
    <h1>Posted Models</h1>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Car</th>
                <th scope="col">Date Prodaction</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($models as $model)
            <tr>
                <td>{{$model->model_name}}</td>
                <td style="max-width: 350px;">{{$model->car->name}}</td>
                <td>{{$model->date_prodaction}}</td>
                <td>
                    @if(isset(Auth::user()->id) && Auth::user()->id == $model->user_id || Auth::user()->role_as == 1)

                    <form action="/dashbord/models/{{$model->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="/dashbord/models/{{$model->id}}/edit" class="btn btn-outline-primary">Edit</a>
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                    @endif


                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

@endif
    <br>

    <h1>Posted Engines</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Car model</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($engines as $engine)
            <tr>
                <td>{{$engine->engine_name}}</td>
                <td>{{ $engine->carmodels->model_name}}</td>
                <td>
                    @if(isset(Auth::user()->id) && Auth::user()->id == $engine->user_id || Auth::user()->role_as == 1)

                    <form action="/dashbord/engines/{{$engine->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="/dashbord/engines/{{$engine->id}}/edit" class="btn btn-outline-primary">Edit</a>
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                    @endif


                </td>
            </tr>
            @endforeach

        </tbody>
    </table>


</div>

@endsection('content')