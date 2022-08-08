<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>{{$car->name}}</title>
</head>
<body style='justify-content:center; align-items:center;'>
    <div style="text-align:center;">

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
        <br>
        <img style="height:400px;width:400px; border-radius: 30px;" src="{{ asset('images/' . $car->image_path) }}" alt="">

        <br>
        <br>

        <p>
            {{$car->description}} 
        </p>

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
                        {{date('d-m-Y',strtotime($model->dateProdaction->created_at))}}
                        
                    </p>
                </td>
            </tr>

            @empty

            <p> There No models</p>

            @endforelse
    

        </tbody>
    </table>
    </div>
</body>
</html>