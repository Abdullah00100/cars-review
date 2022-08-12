<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\car;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = CarModel::all();
        
        return view('admin.Models.index')->with('models',$models);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = car::all();

        return view('admin/models/create')->with('cars',$cars);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $car= CarModel::create([
            'model_name'=>$request->input('name'),
            'car_id'=>$request->input('car'),
            'date_prodaction'=>$request->input('date_prodaction'),
            'user_id'=>Auth()->user()->id
            
        ]);


        return redirect('dashbord/models'); 
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cars = Car::all();

        $model = CarModel::findorfail($id);

        return view('admin.models.edit',
        [
            'model'=>$model,
            'cars'=>$cars

        ]
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
         CarModel::where('id',$id)->update([
            'model_name'=>$request->input('name'),
            'car_id'=>$request->input('car'),
            'date_prodaction'=>$request->input('date_prodaction')
    
    
        ]);
        return redirect('dashbord/models');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = CarModel::where('id',$id)->delete();
        return redirect('dashbord/models');
    }
}
