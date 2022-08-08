<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\Http\Requests\CreateValidationRequest;
use Illuminate\Support\Facades\Auth;

class CarsController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth',['except'=>['index','show']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cars= DB::table('cars')->paginate(4)
        // $cars = Car::all()->toJson();
        // $cars = json_decode($cars);

        $cars = Car::paginate(3);

        return view('admin/cars/index',[
            'cars'=>$cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/cars/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateValidationRequest $request)
    {
        // $car = new car;

        // $car->name = $request->input('name');
        // $car->founded = $request->input('founded');
        // $car->description = $request->input('description');
        // $car->save();

        //Request all input fields
        // $test= $request->all();

        //exept method
        // $test= $request->except('_token'); or only('')

        // has 
        // $test= $request->has('founded');

        // if($request->has('founded')){
        //     dd('founded has been added');
        // }

        //courrent path
        // if($request->is('cars')){
        //     dd('endpoint is cars!');
        // }
           
        //current path
        // if ($request->ismethod('post')) {
        //     dd('method is post!');
        // }

        //show URL
        // dd($request->url());

        //show the IP

        // dd($request->ip());


        //method we can use on request
        //guessExtension()
        //getMimeType()
        //store()
        //asstore()
        //storePublicly()
        //move()
        //getClientOriginalName()
        //getClientMimeType()
        //guessClientExtension()
        //getSize()
        //getError()
        //isValid()

        //$test = $request->file('image')->isValid();

        
        $request->validated();

        $newImageName = time() . '-' . $request->name . '.' . 
        $request->image->extension();

        $request->image->move(public_path('images'),$newImageName);

        
        $car= Car::create([
            'name'=>$request->input('name'),
            'founded'=>$request->input('founded'),
            'description'=>$request->input('description'),
            'image_path'=>$newImageName,
            'user_id'=>Auth()->user()->id
        ]);//in this way we need to make a new proparty call fillable to out model


        return redirect('dashbord/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = car::find($id);


        return view('admin.cars.show')->with('car',$car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = car::findorfail($id);

        

        return view('admin.cars.edit')->with('car',$car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateValidationRequest $request, $id)
    {

        $request->validated();

        $newImageName = time() . '-' . $request->name . '.' . 
        $request->image->extension();

        $request->image->move(public_path('images'),$newImageName);


        
        $car= car::where('id',$id)->update([
            'name'=>$request->input('name'),
            'founded'=>$request->input('founded'),
            'description'=>$request->input('description'),
            'image_path'=>$newImageName

    
    
        ]);
        return redirect('dashbord/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = car::where('id',$id)->delete();
        return redirect('dashbord/cars');

    }
}
