<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;
    
    protected $table = 'cars';

    protected $primarykey = 'id';

    protected $fillable = ['name','founded', 'description','image_path','user_id'];

    protected $visible = ['id','name','founded', 'description'];

    protected $hidden = ['created_at'];

    public function CarModels(){

        return $this->hasMany(CarModel::class);
    }

    public function headquarters(){
        return $this->hasOne(headquarters::class);
    }

    public function engines(){
        return $this->hasManyThrough(
        engines::class,
        carModel::class,
        'car_id', // foreign key on CarModel table
        'model_id' // foreign key on Engines table
    );
    }

    public function productionDate(){
        return $this->hasManyThrough(
            carproductionDate::class,
            CarModel::class,
            'car_id',
            'model_id'
        ); 
    }

    public function products(){
        return $this->belongsToMany(product::class);
    }


    // protected $dateFormat = 'h:m:s';
}
