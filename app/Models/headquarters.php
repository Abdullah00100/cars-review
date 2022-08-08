<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class headquarters extends Model
{
    use HasFactory;

    public function car(){
        return $this->belongsTo(car::class);
    }
}
