<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\engines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnginesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engines = engines::all();


        return view('admin/engines/index')->with('engines',$engines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = CarModel::class::all();


        return view('admin/engines/create')->with('models',$models);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        engines::create([
            'engine_name'=>$request->input('name'),
            'model_id'=>$request->input('model'),
            'user_id'=>Auth()->user()->id
        ]);


        return redirect('dashbord/engines');
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
        $engine = engines::findorfail($id);
        $models = CarModel::get();


        return view('admin/engines/edit',compact('engine','models'));
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
        
        $data=$request->all();
        $data['user_id']=Auth::user()->id;
        engines::where('id',$id)->first()->update($data);
        return redirect('dashbord/engines');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        engines::where('id',$id)->delete();
        return redirect('dashbord/engines');
    }
}
