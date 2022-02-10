<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    protected $fillable = [
        'detalle',
        'atencion',
        'user_id',
        'estation_id',
        'observationable_id',
        'obserationable_type'
    ];

    public function observationable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function estation()
    {
        return $this->belongsTo(Estation::class);
    }
}
