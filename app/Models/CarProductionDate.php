<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarProductionDate extends Model
{
    use HasFactory;

    public function cars(){
        return $this->belongsTo(car::class);
    }
}
