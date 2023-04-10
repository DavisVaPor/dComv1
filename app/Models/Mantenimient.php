<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimient extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'fechaMantenimiento',
        'report_id',
        'estation_id',
        'user_id',
    ];

    public function report(){
        return $this->belongsTo(Report::class);
    }

    public function estation(){
        return $this->belongsTo(Estation::class);
    }

    public function activities(){
        return $this->hasMany(Activity::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
