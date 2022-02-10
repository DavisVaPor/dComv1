<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubigee extends Model
{
    use HasFactory;

    public function estation()
    {
        return $this->hasMany(Estation::class);
    }

    public function measurement(){
        return $this->hasMany(Measurement::class);
    }

    public function promotions(){
        return $this->hasMany(Promotion::class);
    }

    public function ubigeo(){
        return $this->hasMany(Ubigee::class);
    }

    public function commissions()
    {
        return $this->belongsToMany(Commission::class);
    }
}
