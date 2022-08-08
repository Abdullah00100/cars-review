<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $table = 'car_models';

    protected $primarykey = 'id';

    protected $fillable = ['model_name','car_id','image_path','date_prodaction','user_id'];


    public function car(){
        return $this->belongsTo(car::class);
    }

    public function dateProdaction(){
        return $this->hasOne(CarProductionDate::class, 'model_id');
    }

    public function engines(){
        return $this->hasMany(engines::class);
    }
    

    
}
