<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;

    protected $fillable = [
        'ubicacion',
        'latitud',
        'longitud',
        'rni',
        'maps',
        'fecha',
        'imagen',
        'ubigee_id',
        'report_id',
    ];

    public function report(){
        return $this->belongsTo(Report::class);
    }

    public function ubigee()
    {
        return $this->belongsTo(Ubigee::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

}
