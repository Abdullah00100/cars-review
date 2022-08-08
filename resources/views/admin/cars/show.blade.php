@extends('admin.admin_layouts.app')

@section('content')

<div style="text-align:center;" class="row">

    <div class="col-lg-6">

        <h1>{{$car->name}}</h1>
        <p>{{$car->headquarters['headquarters'] ?? null}}, {{$car->headquarters['country'] ?? null}}</p>

        <h5 style="color:brown;">Founded in : {{$car->founded}}</h5>

        <p>Product Types :
            @forelse($car->products as $product)

            {{$product->name}}

            @empty

            type not found

            @endforelse
        </p>
        <p>
            {{$car->description}}
        </p>

    </div>

    <div class="col-lg-6">
    <img style="height:350px;width:400px; border-radius: 30px;" src="{{ asset('images/' . $car->image_path) }}" alt="">

        
    </div>

</div>

<br>
<br>
<br>


<table class="table">
    <thead>
        <tr>
            <th scope="col">Models</th>
            <th scope="col">Engines</th>
            <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse($car->CarModels as $model)

        <tr>
            <td style="font-family:Cursive;">
                <p>{{$model['model_name']}}</p>
            </td>

            <td>
                <p>
                    @foreach($car->Engines as $engine)
                    @if($model->id == $engine->model_id)
                    {{$engine->engine_name}}
                    @endif
                    @endforeach
                </p>
            </td>

            <td>
                <p>
                    {{$model['date_prodaction']}}

                </p>
            </td>
        </tr>

        @empty

        <p> There No models</p>

        @endforelse


    </tbody>
</table>

@endsection('content')