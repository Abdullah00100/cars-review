<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class engines extends Model
{
    use HasFactory;

    protected $table = 'engines'; 

    protected $fillable = ['engine_name','model_id','user_id'];

    public function carModels(){

        return $this->belongsTo(carmodel::class,'model_id');
       
    }
}
