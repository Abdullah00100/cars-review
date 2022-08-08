<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\CarModel;
use App\Models\engines;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function showUserPage($id){
        

        $carslist = car::where('user_id', $id)->get();
        $modelslist = CarModel::where('user_id', $id)->get();
        $engineslist = engines::where('user_id', $id)->get();
        

        return view('admin/user',[
            'cars'=>$carslist,
            'models'=>$modelslist,
            'engines'=>$engineslist
        ]);
    }
}
