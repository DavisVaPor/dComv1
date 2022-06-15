<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'tipoActivity',
        'report_id',
        'estation_id',
        'fechaInicio',
        'fechaFin',
    ];

    public function report(){
        return $this->belongsTo(Report::class);
    }

    public function estation(){
        return $this->belongsTo(Estation::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

}
